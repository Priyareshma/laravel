<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
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
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    // public function login(Request $request)
    // {


    // //    dd( Auth::guard('admin'));

    //     // $this->validate($request, [
    //     //     'email'    => 'required|email',
    //     //     'password' => 'required|min:6'
    //     // ]);
    //     $data=$request->only('email','password');
    //     dd(Auth::guard('admin')->check($request));



    //     if(Auth::guard('admin')->attempt($data)) {

    //         return redirect()->route('adminregister');
    //     }
    //     // else{

    //     // return back()->withInput()->with('error','Incorrect username and password');
    //     // }

    // }
}

