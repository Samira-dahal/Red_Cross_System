<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Donation;
use App\Models\BloodType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();

        return view('donors.index', compact('donors'));
    }

    public function create()
    {
        $bloodtypes = BloodType::all();
        return view('donors.create', compact('bloodtypes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->except(['created_by', 'created_date']);

        if ($request->hasFile('photo')) {
            $input['photo'] = base64_encode(file_get_contents($request->file('photo')->path()));
        }

        $input['created_by'] = Auth::id();

        $input['created_date'] = now();

        Donor::create($input);

        return redirect()->route('donors.index')->with('success', 'Donor created successfully.');
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        $bloodtypes = BloodType::all();
        return view('donors.edit', compact('donor', 'bloodtypes'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $donor = Donor::findOrFail($id);

        $input = $request->except(['created_by', 'created_date']);

        if ($request->hasFile('photo')) {
            $input['photo'] = base64_encode(file_get_contents($request->file('photo')->path()));
        } else {
            $input['photo'] = $donor->photo;
        }

        $input['created_by'] = $donor->created_by;
        $input['created_date'] = $donor->created_date;

        $donor->update($input);

        return redirect()->route('donors.index')->with('success', 'Donor updated successfully.');
    }

    public function toggleStatus($id): RedirectResponse
    {
        $donor = Donor::findOrFail($id);

        $donor->status = $donor->status === 'Active' ? 'Inactive' : 'Active';
        $donor->save();

        return redirect()->route('donors.index')->with('success', 'Donor status updated.');
    }

    public function show($id)
    {
        // Find the donor by ID
        $donor = Donor::findOrFail($id);

        // Fetch the donations for this donor, ensure to use a default empty collection if no donations are found
        $donations = $donor->donations()->get();  // Ensure the relationship is loaded correctly

        return view('donors.show', compact('donor', 'donations'));
    }
}
