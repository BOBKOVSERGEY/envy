<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
Route::post('login', Auth\LoginController::class)->name('login');
Route::post('register', Auth\RegisterController::class)->name('register');
