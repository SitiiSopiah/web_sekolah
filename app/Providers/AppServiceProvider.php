<?php

namespace App\Providers;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.navbars.sidebar', function ($view) {
            $view->with('profil', ProfilSekolah::first());
        });

        View::composer('template.landing', function ($view) {
            $view->with('profil', ProfilSekolah::first());
        });
    }
}
