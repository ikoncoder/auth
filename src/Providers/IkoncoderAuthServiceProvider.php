<?php

namespace Ikoncoder\Auth\Providers;

use Ikoncoder\Auth\Facades\AuthUser;
use Ikoncoder\Auth\Http\Controllers\AuthUserController;
use Ikoncoder\Auth\UserFactory;
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
        Route::get('auth-user', AuthUserController::class);

        //load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'auth-user');

        //publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/auth-user'),
        ]);
    }

    public function register()
    {
        //register Facade
        $this->app->bind('auth-user', function () {
            return new UserFactory();
        });
    }
}
