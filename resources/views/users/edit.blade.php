@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Card for Edit User Form -->
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-edit"></i> Edit User
            </h3>
        </div>
        <div class="card-body">
            <!-- Form -->
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="role_id" class="form-control" required>
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Password (Optional) -->
                <div class="form-group">
                    <label for="password">Password (Leave blank to keep current password)</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password">
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm New Password">
                </div>

                <!-- Submit Button -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
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
    <script> console.log('Edit User Page Loaded'); </script>
@endsection
