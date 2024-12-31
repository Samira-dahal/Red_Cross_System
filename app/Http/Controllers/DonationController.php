<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Campaign;
use App\Models\Donor;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $donations = Donation::with(['donor', 'campaign', 'branch', 'creator'])->get();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        $campaigns = Campaign::all();
        $donors = Donor::all();
        $branches = Branch::all();

        $lastDonation = Donation::orderBy('bag_no', 'desc')->first();
        if ($lastDonation) {
            preg_match('/(\d+)$/', $lastDonation->bag_no, $matches);
            $nextBagNo = 'B' . str_pad((int) $matches[0] + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextBagNo = 'B001';
        }

        return view('donations.create', compact('campaigns', 'donors', 'branches', 'nextBagNo'));
    }





    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateDonation($request);

        $validated['created_by'] = Auth::id();
        $validated['donation_date'] = now();
        $validated['expiry_date'] = now()->addDays(365 * 10);
        Donation::create($validated);

        return redirect()->route('donations.index')->with('success', 'Donation created successfully.');
    }

    public function edit(Donation $donation)
    {
        $campaigns = Campaign::all();
        $donors = Donor::all();
        $branches = Branch::all();
        return view('donations.edit', compact('donation', 'campaigns', 'donors', 'branches'));
    }

    public function update(Request $request, Donation $donation): RedirectResponse
    {
        $validated = $this->validateDonation($request);

        $validated['updated_by'] = Auth::id();

        $donation->update($validated);

        return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
    }


    public function toggleStatus($id): RedirectResponse
    {
        $donation = Donation::findOrFail($id);

        $donation->status = $donation->status === 'Active' ? 'Inactive' : 'Active';
        $donation->save();

        return redirect()->route('donations.index')->with('success', 'Donation status updated successfully.');
    }

    private function validateDonation(Request $request): array
    {
        return $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'quantity' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'bag_no' => 'required|max:10',
            'campaign_id' => 'nullable|exists:campaigns,id',
        ]);
    }

    public function bloodView()
    {
        $campaignDonors = Donation::whereNotNull('campaign_id')->with('donor')->get();
        $nonCampaignDonors = Donation::whereNull('campaign_id')->with('donor')->get();
        $allDonors = $campaignDonors->merge($nonCampaignDonors);
        return view('donations.blood-view', compact('allDonors'));
    }




}
