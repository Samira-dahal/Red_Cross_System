@extends('adminlte::page')

@section('title', 'Create Donation')

@section('content_header')
<h1>Create Donation</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-plus-circle"></i> Create New Donation
            </h3>
        </div>
        <div class="card-body">
            <form id="donationsForm" action="{{ route('donations.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="campaign_id">Select Campaign (Optional)</label>
                    <select name="campaign_id" id="campaign_id" class="form-control">
                        <option value="">Select Campaign</option>
                        @foreach ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" {{ old('campaign_id') == $campaign->id ? 'selected' : '' }}>
                                {{ $campaign->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('campaign_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="donor_id">Select Donor</label>
                    <select name="donor_id" id="donor_id" class="form-control" required>
                        <option value="">Select Donor</option>
                        @foreach ($donors as $donor)
                            <option value="{{ $donor->id }}" {{ old('donor_id') == $donor->id ? 'selected' : '' }}>
                                {{ $donor->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('donor_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity"
                        value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

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
                    @error('branch_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bag_no">Bag Number</label>
                    <!-- Pre-fill with the next available bag number and make it readonly -->
                    <input type="text" name="bag_no" id="bag_no" class="form-control" value="{{ $nextBagNo }}" readonly
                        required pattern="[A-Za-z0-9]{1,10}"
                        title="Bag number should be alphanumeric and up to 10 characters">
                    @error('bag_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

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
<script>
    console.log('Create Donation Page Loaded');
</script>
@endsection