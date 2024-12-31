@extends('adminlte::page')

@section('title', 'Donor Profile')

@section('content_header')
<h1 class="text-center mb-4">Donor Profile</h1>
@stop

@section('content')
<a href="{{ route('donors.index') }}" class="btn btn-primary btn-sm mb-4">
    <i class="fas fa-arrow-left"></i> Back to Donor List
</a>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm border-0" style="height: 100%; min-height: 400px;">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-center">Donor Information</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    @if($donor->photo)
                        <img src="data:image/jpeg;base64,{{ $donor->photo }}" alt="Donor Photo"
                            class="img-fluid rounded-circle shadow" style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-photo.jpg') }}" alt="Default Photo"
                            class="img-fluid rounded-circle shadow" style="width: 120px; height: 120px; object-fit: cover;">
                    @endif
                </div>
                <div>
                    <p><strong>Name:</strong> {{ $donor->name }}</p>
                    <p><strong>Email:</strong> {{ $donor->email }}</p>
                    <p><strong>Mobile Number:</strong> {{ $donor->mobile_number ?? 'N/A' }}</p>
                    <p><strong>Temporary Address:</strong> {{ $donor->temporary_address }}</p>
                    <p><strong>Permanent Address:</strong> {{ $donor->permanent_address }}</p>
                    <p><strong>Joined:</strong> {{ $donor->created_at->format('d M, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm border-0" style="height: 100%; min-height: 400px;">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-center">Donation History</h4>
            </div>
            <div class="card-body">
                @if($donor->donations->isEmpty())
                    <p class="text-center">No donations found for this donor.</p>
                @else
                    <ul class="list-unstyled">
                        @foreach($donor->donations as $donation)
                            <li class="mb-3">
                                <div class="bg-light p-3 rounded">
                                    <p><strong>Donation Date:</strong>
                                        {{ \Carbon\Carbon::parse($donation->donation_date)->format('d M, Y') }}</p>
                                    <p><strong>Bag No:</strong> {{ $donation->bag_no }}</p>
                                    @if($donation->campaign)
                                        <p><strong>Campaign:</strong> {{ $donation->campaign->name }}</p>
                                    @else
                                        <p><strong>No Campaign:</strong> Normal Donor</p>
                                    @endif
                                    <p><strong>Expiry Date:</strong>
                                        {{ \Carbon\Carbon::parse($donation->expiry_date)->format('d M, Y') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<style>
    .card-header {
        background-color: #007bff;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-body p {
        margin-bottom: 0.75rem;
    }

    .card {
        border-radius: 10px;
        margin-bottom: 20px;
        min-height: 400px;
    }

    .col-md-6 {
        margin-bottom: 20px;
    }
</style>
@stop
