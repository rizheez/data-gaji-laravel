<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
        //
        setlocale(LC_ALL, 'id_ID');
        setlocale(LC_ALL, 0);
        // Set Carbon locale
        Carbon::setLocale('id');
    }
}
