<?php

namespace App\Providers;

use App\Models\DataWisata;
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
    public function boot()
    {
        // Membagikan countWisata ke seluruh view
        $countWisata = DataWisata::count();
        View::share('countWisata', $countWisata);
    }
}
