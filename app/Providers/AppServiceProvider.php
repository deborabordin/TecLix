<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Comprovante;
use App\Observers\ComprovanteObserver;

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
        Comprovante::observe(ComprovanteObserver::class);
    }
}
