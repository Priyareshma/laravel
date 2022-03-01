<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sample=DB::table('users')
            ->join('attendances', 'users.id', '=', 'attendances.emp_id')
            ->groupBy('users.id','users.name','users.dob','users.gender','users.date_of_joining','users.email','users.address','users.phone')
            ->select('users.id as id', 'users.name as name','users.dob as dob','users.gender as gender','users.date_of_joining as date_of_joining','users.email as email','users.address as address','users.phone as phone', DB::raw("count(attendances.emp_id) as Total_working_days"))
            ->get();
            return view('admin.home',compact('sample'));
    }
}
