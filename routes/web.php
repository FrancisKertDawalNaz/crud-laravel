<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', [RegisterController::class, 'show'])->name('home');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');