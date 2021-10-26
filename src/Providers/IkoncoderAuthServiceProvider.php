<?php

namespace Ikoncoder\Auth\Providers;

use Illuminate\Routing\Route;
use Ikoncoder\Auth\UserFactory;
use Ikoncoder\Auth\Facades\AuthUser;
use Ikoncoder\Auth\Http\Controllers\AuthUserController;
use Illuminate\Support\ServiceProvider;

class IkoncoderAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //register command
        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthUser::class,
            ]);
        }

        //register routes
        //Route::get('auth-user', AuthUserController::class);
        Route::get(config('auth-user.route'), AuthUserController::class);   //config/auth-user.php
        //load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'auth-user');

        //publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/auth-user')
        ],'views');

        //publish config
        $this->publishes([
            __DIR__.'/../resconfig/auth-user' => config_path('config/auth-user.php')
        ],'config');

        //publish migrations 
        if(!class_exists(CreateAdminsTable)){
            $this->publishes([
                __DIR__.'/../database/migrations/create_admins_table.php.stub' => database_path('database/migrations/'.date('Y_m_d_His',time()).'create_admins_table.php')
            ],'migrations');
        }
    }

    public function register()
    {
        //register Facade
        $this->app->bind('auth-user', function () {
            return new UserFactory();
        }); 

        //config 
        $this->mergeConfigFrom(__DIR__.'/../config/auth-user.php','auth-user');
    }
}
