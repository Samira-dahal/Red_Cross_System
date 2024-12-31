<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('branch')->get();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('campaigns.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $input = $request->all();
        $input['created_by'] = Auth::id(); // Set the created_by to the logged-in user's ID
        $input['created_date'] = now();

        Campaign::create($input);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully.');
    }

    public function edit(Campaign $campaign)
    {
        $branches = Branch::all();
        return view('campaigns.edit', compact('campaign', 'branches'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $input = $request->all();
        $input['updated_by'] = Auth::id();

        $campaign->update($input);

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully.');
    }

    public function toggleStatus($id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->status = $campaign->status === 'Active' ? 'Inactive' : 'Active';
        $campaign->save();

        return redirect()->route('campaigns.index')->with('success', 'Campaign status updated successfully.');
    }

}
