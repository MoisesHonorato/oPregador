<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EsbocoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [EsbocoController::class, 'index'])->middleware('auth');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('donations', DonationController::class)->middleware('auth');
Route::resource('esbocos', EsbocoController::class)->middleware('auth');
Route::resource('profiles', ProfileController::class)->middleware('auth');
Route::resource('sermons', SermonController::class)->middleware('auth');
Route::resource('suggestions', SuggestionController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');