<?php
use App\Models\Admin;
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // $count=Attendance::groupBy('emp_id')
            // ->selectRaw('emp_id,count(*) as total_working_days')
            // ->get();
            // $employee=User::all();
            $sample=DB::table('users')
->join('attendances', 'users.id', '=', 'attendances.emp_id')
->groupBy('users.id','users.name','users.dob','users.gender','users.date_of_joining','users.email','users.address','users.phone')
->select('users.id as id', 'users.name as name','users.dob as dob','users.gender as gender','users.date_of_joining as date_of_joining','users.email as email','users.address as address','users.phone as phone', DB::raw("count(attendances.emp_id) as Total_working_days"))
->get();
dd(compact('sample'));

    }
    public function register()
    {
        return view('adminregister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlogin');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],

        ]);
        return redirect()->route('admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
