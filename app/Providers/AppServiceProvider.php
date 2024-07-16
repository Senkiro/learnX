<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
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
        $app_url = config("app.url");

//        dd(config("app.env"));
        if (app()->environment('production') && !empty($app_url)) {
            $this->app['request']->server->set('HTTPS','on');

            URL::forceRootUrl($app_url);
            $schema = explode(':', $app_url)[0];

            URL::forceScheme($schema);
        }
    }
}
