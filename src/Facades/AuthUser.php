<?php 

namespace Ikoncoder\Auth\Facades;

use Illuminte\Support\Facades\Facade;

class AuthUser extends Facade 
{
    protected static function getFacadeAccessor()
    {
    	return 'auth-user';
    } 
}
