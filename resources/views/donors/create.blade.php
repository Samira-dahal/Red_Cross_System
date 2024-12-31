@extends('adminlte::page')

@section('title', 'Add New Donor')

@section('content_header')
<h1>Add New Donor</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Add New Donor Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-user-plus"></i> Add Donor Details
            </h3>
        </div>
        <div class="card-body">
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Add Donor Form -->
            <form action="{{ route('donors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="temporary_address">Temporary Address</label>
                    <input type="text" class="form-control" id="temporary_address" name="temporary_address"
                        value="{{ old('temporary_address') }}" required>
                </div>

                <div class="form-group">
                    <label for="permanent_address">Permanent Address</label>
                    <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                        value="{{ old('permanent_address') }}" required>
                </div>

                <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                        value="{{ old('mobile_number') }}" required>
                </div>

                <div class="form-group">
                    <label for="secondary_number">Secondary Number</label>
                    <input type="text" class="form-control" id="secondary_number" name="secondary_number"
                        value="{{ old('secondary_number') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="bloodtype_id">Select BloodType</label>
                    <select name="bloodtype_id" id="bloodtype_id" class="form-control" required>
                        <option value="">Select BloodType</option>
                        @foreach ($bloodtypes as $bloodtype)
                            <option value="{{ $bloodtype->id }}" {{ old('bloodtype_id') == $bloodtype->id ? 'selected' : '' }}>
                                {{ $bloodtype->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save Donor
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('js')
<script> console.log('Add Donor Page Loaded'); </script>
@endsection
