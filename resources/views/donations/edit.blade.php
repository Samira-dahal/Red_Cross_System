@extends('adminlte::page')

@section('title', 'Edit Donation')

@section('content_header')
<h1>Edit Donation</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-edit"></i> Edit Donation
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('donations.update', $donation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="campaign_id">Select Campaign (Optional)</label>
                    <select name="campaign_id" id="campaign_id" class="form-control">
                        <option value="">Select Campaign</option>
                        @foreach ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" {{ $donation->campaign_id == $campaign->id ? 'selected' : '' }}>
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
                    <select name="donor_id" id="donor_id" class="form-control">
                        @foreach ($donors as $donor)
                            <option value="{{ $donor->id }}" {{ $donation->donor_id == $donor->id ? 'selected' : '' }}>
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
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ old('quantity', $donation->quantity) }}" required>
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="branch_id">Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $donation->branch_id == $branch->id ? 'selected' : '' }}>
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
                    <input type="text" name="bag_no" id="bag_no" class="form-control" value="{{ $donation->bag_no }}"
                        readonly required pattern="[A-Za-z0-9]{1,10}"
                        title="Bag number should be alphanumeric and up to 10 characters">
                    @error('bag_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
