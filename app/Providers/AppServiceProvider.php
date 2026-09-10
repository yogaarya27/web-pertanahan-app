<?php

namespace App\Providers;

use App\Models\DataPertanahan;
use App\Observers\DataPertanahanObserver;
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
        DataPertanahan::observe(DataPertanahanObserver::class);
    }
}
