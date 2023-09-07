<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProvinceRepository;
use App\Interfaces\ProvinceInterface;
use App\Repositories\CityRepository;
use App\Interfaces\CityInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProvinceInterface::class, ProvinceRepository::class);
        $this->app->bind(CityInterface::class, CityRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
