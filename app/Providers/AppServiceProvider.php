<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $serviceBinding =[
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\RoleServiceInterfaceServiceInterface' => 'App\Services\RoleService',
        'App\repositories\Interfaces\RoleRepositoryInterfaceRepositoryInterface' => 'App\repositories\RoleRepository',

        'App\repositories\Interfaces\ProvinceRepositoryInterface' => 'App\repositories\ProvinceRepository',
        'App\repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\CourseServiceInterfaceServiceInterfaceServiceInterface' => 'App\Services\CourseService',
        'App\repositories\Interfaces\CourseRepositoryInterfaceRepositoryInterface' => 'App\repositories\CourseRepository',

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
