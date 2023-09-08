<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProvinceRepository;
use App\Repositories\RajaOngkirProvinceRepository;
use App\Interfaces\ProvinceInterface;
use App\Repositories\CityRepository;
use App\Repositories\RajaOngkirCityRepository;
use App\Interfaces\CityInterface;
use App\Repositories\UserRepository;
use App\Interfaces\UserInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //uncomment for swappablle implementation
        // $this->app->bind(ProvinceInterface::class, ProvinceRepository::class);
        $this->app->bind(ProvinceInterface::class, RajaOngkirProvinceRepository::class);
        // $this->app->bind(CityInterface::class, CityRepository::class);
        $this->app->bind(CityInterface::class, RajaOngkirCityRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
