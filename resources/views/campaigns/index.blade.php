@extends('adminlte::page')

@section('title', 'Campaigns')

@section('content_header')
<h1>Campaigns</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Add Campaign
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Card for Campaign List -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-list"></i> List of Campaigns
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaigns as $campaign)
                        <tr>
                            <td>{{ $campaign->id }}</td>
                            <td>{{ $campaign->name }}</td>
                            <td>{{ $campaign->branch->branch_name }}</td>
                            <td>{{ $campaign->start_date }}</td>
                            <td>{{ $campaign->end_date }}</td>
                            <td>
                                <form action="{{ route('campaigns.toggle-status', $campaign->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm btn-{{ $campaign->status === 'Active' ? 'success' : 'secondary' }}">
                                        {{ $campaign->status }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
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
<script> console.log('Campaigns Page Loaded'); </script>
@endsection
