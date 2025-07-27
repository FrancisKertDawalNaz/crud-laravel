
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', [RegisterController::class, 'show'])->name('home');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::delete('/user/{id}', [RegisterController::class, 'destroy'])->name('user.delete');
Route::put('/user/{id}', [RegisterController::class, 'update'])->name('user.update');