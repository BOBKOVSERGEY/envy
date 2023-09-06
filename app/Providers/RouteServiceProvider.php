<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Li;

class RouteServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        RateLimiter::for(
            name: 'api',
            callback: static fn (Request $request): Limit =>Limit::perMinute(
                maxAttempts: 60
            )->by(
                key: $request->user()?->id ?: $request->ip(),
            )
        );
        $this->routes(function ():void {
            Route::middleware('api')
                ->group(base_path('routes/routes.php'));
        });
    }
}
