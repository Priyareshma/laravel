<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    protected $redirectTo = '/admin';
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('adminlogin');
    }

    public function logout(Request $request)
    {
        $this->guard();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function login(Request $request)
    {

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>   $request->password])) {

            return redirect()->intended(route('admin.dashboard'));
        }
        else{

        return redirect()->back()->withInput($request->only('email'));
        }

    }
}

