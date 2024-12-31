@extends('adminlte::page')

@section('title', 'Branch Management')

@section('content_header')
<h1>Branch Management</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <a href="{{ route('branches.create') }}" class="btn btn-primary">
            <i class="fas fa-code-branch"></i> Add Branch
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
                <i class="fas fa-code-branch"></i> List of Branches
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Branch Name</th>
                        <th>Location</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                        <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->branch_name }}</td>
                            <td>{{ $branch->location }}</td>
                            <td>{{ $branch->province->name }}</td>
                            <td>{{ $branch->country->name }}</td>
                            <td>
                                <form action="{{ route('branches.toggle-status', $branch->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm btn-{{ $branch->status === 'Active' ? 'success' : 'secondary' }}">
                                        {{ $branch->status }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('branches.edit', $branch->id) }}"
                                    class="btn btn-primary btn-sm">Update</a>
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
<script> console.log('Branch Management Page Loaded'); </script>
@endsection
