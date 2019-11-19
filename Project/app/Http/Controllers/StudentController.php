<?php

namespace App\Http\Controllers;

use App\student;
use DB;
use Session;
use Illuminate\Http\Request;

class StudentController extends Controller
{   
    public function checkLogin(){
         if(Session::has('role')) return true;
         else return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!StudentController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        $user = Session::get('user');
        $student=student::where('username', '=', $user)->first();
        return view('student.user_info',compact('student', $student));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.addUserInfo');
    }

    public function editForm(){
        $user = Session::get('user');
        $info=student::where('username', '=', $user)->first();

        return view('student.userEdit',compact('info',$info));
    }

    public function studentEdit(Request $info){

        $user = Session::get('user');

        $data = array(
            //db column            //form name
            'fname'=> $info->input('fname'),
            'lname'=> $info->input('lname'),
            'phone_no'=> $info->input('phone_no'),
            'fb_contact'=> $info->input('fb_contact'),
            'address'=> $info->input('address')
        );

        DB::table('students')->where('username', '=', $user)->update($data);

        
       echo "<script>window.location.href='user';</script>";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function student_search(Request $request){
        //select data from DB
        $info = student::where('std_id', '=', $request->input('std_id'))->first();

        //check that Is data exist
        if($info === null){
            return view('staff.student_info')
            ->with('check', false);
        }
        else{
            return view('staff.student_info')
            ->with('id', $request->input('std_id'))
            ->with('info',$info)
            ->with('check', true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
