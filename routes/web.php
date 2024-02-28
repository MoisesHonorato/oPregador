<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EsbocoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('auth/login');
});

Route::resource('/', DashboardController::class);

// =============== ADMIN =========================
Route::middleware('admin')->group(function () {

});

// =============== PREGADOR =========================
Route::middleware('pregador')->group(function () {
    
});

// =============== TODOS USERS =========================
Route::middleware('auth')->group(function () {
    Auth::routes();
    Route::resource('donations', DonationController::class);
    Route::resource('esbocos', EsbocoController::class);
    Route::resource('sermons', SermonController::class);
    Route::resource('suggestions', SuggestionController::class);
    Route::resource('profiles', ProfileController::class);
});
