<?php 

namespace Ikoncoder\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Ikoncoder\Auth\Facades\AuthUser;

class AuthUserController extends Controller
{
    public function __invoke() 
    {
     return view('auth-user',[
        'user' => AuthUser::getRandomUser()
     ]);   
    }
}