<?php

namespace Ikoncoder\Auth\Facades;

use Illuminate\Support\Facades\Facade;

class AuthUser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth-user';
    }
}
