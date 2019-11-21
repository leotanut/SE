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
        $student=student::where('username', $user)->first();
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
        if(!StudentController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        $user = Session::get('user');
        $info=student::where('username', '=', $user)->first();

        return view('student.userEdit',compact('info',$info));
    }

    public function studentEdit(Request $info){
        if(!StudentController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        $user = Session::get('user');

        $data = array(
            //db column            //form name
            'fname'=> $info->input('fname'),
            'lname'=> $info->input('lname'),
            'phone_no'=> $info->input('phone_no'),
            'fb_contact'=> $info->input('fb_contact'),
            'address'=> $info->input('address')
        );

        if(DB::table('students')->where('username', '=', $user)->update($data)){

        }else{

        }

        
       echo "<script>window.location.href='user';</script>";

    }

    public function delete_enroll($subj_id){
        if(!StudentController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        $user = Session::get('user');
        /*DB::table('enroll')
        ->where('username', '=', $user)
        ->where('subj_id', '=', $subj_id)
        ->delete();*/

        if(DB::table('enroll')
        ->where('username', '=', $user)
        ->where('subj_id', '=', $subj_id)
        ->delete()){
            echo "<script>alert('Delete susceed');";
            echo "window.location.href='/student';</script>";
        }else{
            echo "<script>alert('Delete fail');";
            echo "window.location.href='/student';</script>";
        }

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

    public function enroll(Request $request){       
        $enroll = array(
            'username'=> Session::get('user'),
            'subj_id' => $request->input('subj_id'),
            'section' => $request->input('section')
        ); 

       $check = DB::table('enroll')
       ->where('username', Session::get('user'))
       ->where('subj_id', $request->input('subj_id'))->first();

        
       if($check === null){

         if(DB::table('enroll')->insert($enroll)){
         echo  '<script>alert("Enroll succeed");';
         echo  'window.location.href="/student";</script>' ;
       }
       else{
        echo  '<script>alert("Enroll Failed");';
        echo  'window.location.href="/student";</script>' ;
       }

       }
        else{
                    echo  '<script>alert("This subject has already enrolled");';
         echo  'window.location.href="/student";</script>' ;
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
