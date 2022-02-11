<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $is_update = Attendance::query()->where('start_time', '>=', now()->format('Y-m-d'))
            ->where('emp_id', Auth::id())->exists();
        return view('home', compact('is_update'));
    }

}
