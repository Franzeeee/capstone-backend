<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        RateLimiter::for('login', function (Request $request) {
            // Retrieve the number of attempts for the user/IP
            $attempts = RateLimiter::attempts($request->ip());

            // First attempt: 1-minute limit
            if ($attempts <= 1) {
                return Limit::perMinutes(1, 3)->by($request->ip());
            }

            // Subsequent attempts: 5-minute limit after failure
            return Limit::perMinutes(5, 3)->by($request->ip());
        });
    }
}
