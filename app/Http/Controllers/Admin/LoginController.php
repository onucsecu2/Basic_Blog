<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    //
    protected $redirectTo = '/admin_home';
    
    //Trait
    use AuthenticatesUsers;
    
    //Custom guard for seller
    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }
}
