<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EsbocoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/login', function(){
    return view('auth/login');
    });

Route::resource('/', DashboardController::class)->middleware('auth');
Route::resource('donations', DonationController::class)->middleware('auth');
Route::resource('esbocos', EsbocoController::class)->middleware('auth');
Route::resource('profiles', ProfileController::class)->middleware('auth');
Route::resource('sermons', SermonController::class)->middleware('auth');
Route::resource('suggestions', SuggestionController::class)->middleware('auth');

Auth::routes();
