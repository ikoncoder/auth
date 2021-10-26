<?php

namespace Ikoncoder\Auth\Http\Controllers;

use Ikoncoder\Auth\Facades\AuthUser;
use Illuminate\Routing\Controller;

class AuthUserController extends Controller
{
    public function __invoke()
    {
        return view('auth-user', [
            'user' => AuthUser::getRandomUser(),
        ]);
    }
}
