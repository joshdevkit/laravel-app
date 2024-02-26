<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        switch ($user->type) {
            case 1:
                return redirect('/admin/dashboard');
            case 2:
                return redirect('/manager/dashboard');
            case 3:
                return redirect('/member/dashboard');
            case 0:
                return redirect('/owner/dashboard');
            default:
                return redirect('/home');
        }
    }
}
