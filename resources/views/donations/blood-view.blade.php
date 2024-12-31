@extends('adminlte::page')

@section('title', 'Blood Donation View')

@section('content_header')
<h1>Blood Donation View</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a href="{{ route('donations.create') }}" class="btn btn-primary">
            <i class="fas fa-donate"></i> Add Donation
        </a>

        <a href="{{ route('donations.index') }}" class="btn btn-primary btn-sm ml-2">
            <i class="fas fa-list"></i> Back to Donations List
        </a>
    </div>



    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-hand-holding-heart"></i> Campaign Donors
            </h3>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($allDonors as $donor)
                    @if ($donor->campaign_id)
                        <li>{{ $donor->donor->name }} (Campaign: {{ $donor->campaign->name }})</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-heart"></i> Non-Campaign Donors
            </h3>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($allDonors as $donor)
                    @if (!$donor->campaign_id)
                        <li>{{ $donor->donor->name }} (Normal Donor)</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('js')
<script> console.log('Blood Donation View Page Loaded'); </script>
@endsection
