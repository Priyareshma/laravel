<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('fullcalender');
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
