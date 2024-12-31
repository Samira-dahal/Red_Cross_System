@extends('adminlte::page')

@section('title', 'Edit Branch')

@section('content_header')
<h1>Edit Branch</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Edit Branch Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-edit"></i> Update Branch Details
            </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Branch Name -->
                <div class="form-group">
                    <label for="branch_name">Branch Name</label>
                    <input type="text" name="branch_name" id="branch_name" class="form-control"
                        value="{{ old('branch_name', $branch->branch_name) }}" required>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control"
                        value="{{ old('location', $branch->location) }}" required>
                </div>

                <!-- Province Selection -->
                <div class="form-group">
                    <label for="province_id">Select Province</label>
                    <select name="province_id" id="province_id" class="form-control" required>
                        <option value="">Select Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ $branch->province_id == $province->id ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="country_id">Select Country</label>
                    <select name="country_id" id="country_id" class="form-control" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $branch->country_id == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Active" {{ old('status', $branch->status) === 'Active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="Inactive" {{ old('status', $branch->status) === 'Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Branch
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
<script> console.log('Edit Branch Page Loaded'); </script>
@endsection
