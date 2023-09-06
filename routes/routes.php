<?php


use Illuminate\Support\Facades\Route;



Route::get('/', static fn() => response()
    ->json(data: [
        'message' => 'Service Online'
    ]));

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/auth.php')
);

Route::middleware(['auth:sanctum'])->group(static function():void {
    Route::prefix('apps')->as('apps:')->group(
        base_path('routes/apps.php')
    );



    Route::prefix('devices')->as('devices:')->group(
        base_path('routes/devices.php')
    );

    Route::prefix('packages')->as('packages:')->group(
        base_path('routes/packages.php')
    );

    Route::prefix('shells')->as('shells:')->group(
        base_path('routes/shells.php')
    );
});


