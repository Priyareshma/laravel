<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('welcome');

    }

}
