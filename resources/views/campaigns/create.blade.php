@extends('adminlte::page')

@section('title', 'Create Campaign')

@section('content_header')
<h1>Create Campaign</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Create Campaign Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-plus-circle"></i> Create New Campaign
            </h3>
        </div>
        <div class="card-body">
            <!-- Form -->
            <form action="{{ route('campaigns.store') }}" method="POST">
                @csrf

                <!-- Campaign Name -->
                <div class="form-group">
                    <label for="name">Campaign Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Campaign Name"
                        value="{{ old('name') }}" required>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"
                        value="{{ old('address') }}" required>
                </div>

                <!-- Branch Selection -->
                <div class="form-group">
                    <label for="branch_id">Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        <option value="">Select Branch</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Start Date -->
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ old('start_date') }}" required>
                </div>

                <!-- End Date -->
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}"
                        required>
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
<script> console.log('Create Campaign Page Loaded'); </script>
@endsection
