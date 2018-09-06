<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        return route('posts.index');
    }

    protected function credentials(Request $request)
    {
        return $request->only('first_name', 'last_name', 'password');
    }

    protected function validateLogin(Request $request)
    {
        return true;
    }
}
