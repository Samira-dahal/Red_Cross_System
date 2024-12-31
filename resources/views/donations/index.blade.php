@extends('adminlte::page')

@section('title', 'Donation Management')

@section('content_header')
<h1>Donation Management</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a href="{{ route('donations.create') }}" class="btn btn-primary">
            <i class="fas fa-donate"></i> Add Donation
        </a>
        <a href="{{ route('donations.blood-view') }}" class="btn btn-primary">
            <i class="fas fa-donate"></i> View Blood Donations
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-hand-holding-heart"></i> List of Donations
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Donor</th>
                        <th>Campaign</th>
                        <th>Quantity</th>
                        <th>Branch</th>
                        <th>Bag Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->id }}</td>
                            <td>{{ optional($donation->donor)->name ?? 'N/A' }}</td>
                            <td>{{ optional($donation->campaign)->name ?? 'Normal Donor' }}</td>
                            <td>{{ $donation->quantity }}</td>
                            <td>{{ optional($donation->branch)->branch_name ?? 'N/A' }}</td>
                            <td>{{ $donation->bag_no }}</td>
                            <td>
                                <form action="{{ route('donations.toggle-status', $donation->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm btn-{{ $donation->status === 'Active' ? 'success' : 'secondary' }}">
                                        {{ $donation->status }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-primary btn-sm">
                                    Update
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('js')
<script> console.log('Donation Management Page Loaded'); </script>
@endsection