<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();

        if ($branches->isEmpty()) {
            return view('branches.index', ['branches' => $branches, 'message' => 'No branches found.']);
        }

        $branches->transform(function ($branch) {
            $branch->created_by = $branch->created_by ?? 'System';
            $branch->created_date = $branch->created_at ?? now();
            return $branch;
        });

        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        $provinces = Province::all();
        $countries = Country::all();
        return view('branches.create', compact('provinces', 'countries'));
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $input['created_by'] = Auth::id();

        $input['created_date'] = now();

        Branch::create($input);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $provinces = Province::all();
        $countries = Country::all();

        return view('branches.edit', compact('branch', 'provinces', 'countries'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->except(['created_by', 'created_date']);
        $branch = Branch::findOrFail($id);

        $branch->update($input);

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    public function toggleStatus($id): RedirectResponse
    {
        $branch = Branch::findOrFail($id);

        $branch->status = $branch->status === 'Active' ? 'Inactive' : 'Active';
        $branch->save();

        return redirect()->route('branches.index')->with('success', 'Branch status updated successfully.');
    }
}
