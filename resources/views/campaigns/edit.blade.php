@extends('adminlte::page')

@section('title', 'Edit Campaign')

@section('content_header')
<h1>Edit Campaign</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Edit Campaign Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-edit"></i> Edit Campaign
            </h3>
        </div>
        <div class="card-body">
            <!-- Form -->
            <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campaign Name -->
                <div class="form-group">
                    <label for="name">Campaign Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $campaign->name }}" required>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $campaign->address }}" required>
                </div>

                <!-- Branch Selection -->
                <div class="form-group">
                    <label for="branch_id">Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $campaign->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Start Date -->
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $campaign->start_date }}" required>
                </div>

                <!-- End Date -->
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $campaign->end_date }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Active" {{ $campaign->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $campaign->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
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
<script> console.log('Edit Campaign Page Loaded'); </script>
@endsection
