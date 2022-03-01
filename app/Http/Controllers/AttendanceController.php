<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $current= Carbon::now();
        // dd($current);
        $attendance = Attendance::query()->where('start_time', '>=', now()->format('Y-m-d'))
            ->where('emp_id', Auth::id())->first();

        if ($attendance) {
            $attendance->update(['start_time' => $request->start_time]);
        } else {
            Attendance::create($request->only(['emp_id', 'start_time']));
        }
        return redirect()->route('list')->with('success','Attendance Report Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('edit',compact('data'));
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

        $form_data = array(
            'name'       =>   $request->name,
            'dob'        =>   $request->dob,
            'gender'     =>   $request->gender,
            'date_of_joining' => $request->date_of_joining,
            'address'    =>   $request->address,
            'phone'      =>   $request->phone,
            'email'      =>   $request->email
                );
        $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'dob' => ['required'],
                        'gender'=>['required'],
                        'date_of_joining' =>['required'],
                        'address' => ['required', 'string', 'max:255'],
                        'phone' => ['required', 'string', 'min:10','max:10'],

                ]);

        User::whereId($id)->update($form_data);

        return redirect()->route('list')->with('success', 'Data is successfully updated');
    }
    public function basic_email() {
        $data = array('name'=>"Laravel Otp");
        Mail::send(['name'=>'name'], $data, function($message) {
           $otp = rand(1000,9999);
           $message->from('reshma.ofc@gmail.com','Laravel Otp');
           $message->to('reshma.zeoner@gmail.com', 'Laravel')->subject(' Laravel Otp for Registered Employee '.$otp);

        });
        echo "Basic Email Sent. Check your inbox.";

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
