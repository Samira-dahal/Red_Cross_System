<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;

Route::middleware(['web'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/donations/blood-view', [DonationController::class, 'bloodView'])->name('donations.blood-view');


    Route::resource('users', UserController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('donors', DonorController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('campaigns', CampaignController::class);

    Route::post('/branches/toggle-status/{id}', [BranchController::class, 'toggleStatus'])->name('branches.toggle-status');
    Route::get('/donors/toggle-status/{donor}', [DonorController::class, 'toggleStatus'])->name('donors.toggleStatus');
    Route::post('donations/{id}/toggle-status', [DonationController::class, 'toggleStatus'])->name('donations.toggle-status');
    Route::post('/campaigns/toggle-status/{id}', [CampaignController::class, 'toggleStatus'])->name('campaigns.toggle-status');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



