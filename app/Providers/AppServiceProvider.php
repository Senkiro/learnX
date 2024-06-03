<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $serviceBinding =[
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\UserCatalogueServiceInterfaceServiceInterface' => 'App\Services\UserCatalogueServiceService',
        'App\repositories\Interfaces\UserCatalogueRepositoryInterfaceRepositoryInterface' => 'App\repositories\UserCatalogurRepositoryRepository',

        'App\repositories\Interfaces\ProvinceRepositoryInterface' => 'App\repositories\ProvinceRepository',
        'App\repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',

    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->serviceBinding as $key => $value) {
            $this->app->bind($key, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
