@extends('adminlte::page')

@section('title', 'Create Branch')

@section('content_header')
<h1>Create Branch</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Create Branch Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-plus-circle"></i> Create New Branch
            </h3>
        </div>
        <div class="card-body">
            <!-- Form -->
            <form id="branchesForm" action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Branch Name -->
                <div class="form-group">
                    <label for="branch_name">Branch Name</label>
                    <input type="text" name="branch_name" id="branch_name" class="form-control"
                        placeholder="Enter Branch Name" value="{{ old('branch_name') }}" required>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location"
                        value="{{ old('location') }}" required>
                </div>

                <!-- Province Selection -->
                <div class="form-group">
                    <label for="province_id">Select Province</label>
                    <select name="province_id" id="province_id" class="form-control" required>
                        <option value="">Select Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Country Selection -->
                <div class="form-group">
                    <label for="country_id">Select Country</label>
                    <select name="country_id" id="country_id" class="form-control" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('js')
<script> console.log('Create Branch Page Loaded'); </script>
@endsection
