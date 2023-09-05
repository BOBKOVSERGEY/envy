<?php

declare(strict_types=1);

use App\Http\Controllers\Devices;
use Illuminate\Support\Facades\Route;

Route::post('register', Devices\RegisterController::class)->name('register');
