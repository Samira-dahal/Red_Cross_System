@extends('adminlte::page')

@section('title', 'Red Cross System')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="text-danger font-weight-bold">Red Cross System</h1>
    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-lg">
        Logout
    </a>
</div>
<hr>
@stop

@section('content')
<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12 col-md-3 mb-3">
            <a href="{{ route('branches.index') }}" class="btn btn-danger btn-block">
                <i class="fas fa-building fa-lg"></i><br>
                <span>Branches</span>
            </a>
        </div>

        <div class="col-12 col-md-3 mb-3">
            <a href="{{ route('donors.index') }}" class="btn btn-danger btn-block">
                <i class="fas fa-users"></i><br>
                <span>Donors</span>
            </a>
        </div>

        <div class="col-12 col-md-3 mb-3">
            <a href="{{ route('donations.index') }}" class="btn btn-danger btn-block">
                <i class="fas fa-hand-holding-heart"></i><br>
                <span>Donations</span>
            </a>
        </div>

        <div class="col-12 col-md-3 mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-block">
                <i class="fas fa-users fa-lg"></i><br>
                <span>Users</span>
            </a>
        </div>

        <div class="col-12 col-md-3 mb-3">
            <a href="{{ route('campaigns.index') }}" class="btn btn-danger btn-block">
                <i class="fas fa-bullhorn fa-lg"></i><br>
                <span>Campaigns</span>
            </a>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Button styling */
    .btn-block {
        font-size: 1.2rem;
        /* Text size */
        padding: 1.5rem;
        /* Space inside buttons */
        border-radius: 0.5rem;
        /* Rounded corners */
        text-transform: uppercase;
        /* Uppercase labels */
        font-weight: bold;
    }

    .btn-danger {
        background-color: #dc3545;
        /* Red button color */
        border-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #bd2130;
        /* Darker red on hover */
        border-color: #a71d2a;
    }

    /* Header styling */
    h1 {
        font-size: 2.5rem;
    }

    /* Make icons larger */
    .fa-lg {
        margin-bottom: 0.5rem;
    }
</style>
@stop

@section('js')
<script>
    console.log("Welcome to the Red Cross System homepage!");
</script>
@stop
