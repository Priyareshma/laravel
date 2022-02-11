<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RestoController extends Controller
{
     /** @return string  */
    function index()
  {

    //   $data= User::all();
      $data=DB::table('users')->join('attendances', 'emp_id', '=', 'users.id')->where('emp_id',Auth::id())->get();

       return view('list',['users' => $data]);
  }


}


