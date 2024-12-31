@extends('adminlte::page')

@section('title', 'Donor Records')

@section('content_header')
<h1>Donor Records</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Add Donor Button -->
    <div class="mb-3">
        <a href="{{ route('donors.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Donor
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Donor Table -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-users"></i> List of Donors
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Temporary Address</th>
                        <th>Permanent Address</th>
                        <th>Mobile Number</th>
                        <th>Secondary Number</th>
                        <th>Email</th>
                        <th>Blood Type</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donors as $donor)
                        <tr>
                            <td>{{ $donor->id }}</td>
                            <td>{{ $donor->name }}</td>
                            <td>{{ $donor->temporary_address }}</td>
                            <td>{{ $donor->permanent_address }}</td>
                            <td>{{ $donor->mobile_number }}</td>
                            <td>{{ $donor->secondary_number }}</td>
                            <td>{{ $donor->email ?? 'N/A' }}</td>
                            <td>{{ $donor->bloodtype->name }}</td>
                            <td>
                                @if ($donor->photo)
                                    <img src="data:image/jpeg;base64,{{ $donor->photo }}" alt="Donor Photo"
                                        class="img-thumbnail" style="max-width: 100px; height: auto;">
                                @else
                                    <span class="text-muted">No Photo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('donors.edit', $donor) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <a href="{{ route('donors.show', $donor->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-user-plus"></i> View Profile
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
<script> console.log('Donor Records Page Loaded'); </script>
@endsection