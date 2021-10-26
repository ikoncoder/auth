<?php

namespace Ikoncoder\Auth;

use Illuminate\Support\Facades\Facade;

class AuthUser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth-user';
    }
}
