<?php

declare(strict_types=1);

use App\Http\Controllers\Shells\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class)->name('register');
