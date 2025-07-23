<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load API routes (prefix: /api)
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Load Web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
