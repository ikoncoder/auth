<?php

namespace Ikoncoder\Auth\Providers;

use Ikoncoder\Auth\Facades\AuthUser;
use Ikoncoder\Auth\UserFactory;
use Illuminate\Support\ServiceProvider;

class IkoncoderAuthServiceProvider extends ServiceProvider
{
 public function boot()
 {
   if($this->app->runningInConsole()){
     $this->commands([
       AuthUser::class
     ]);
   }  
 }
   

    public function register()
    {
        //register Facade
        $this->app->bind('auth-user', function () {
            return new UserFactory();
        });
    }
}
