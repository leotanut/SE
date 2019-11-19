<?php

namespace App\Http\Controllers;

use App\staff;
use Illuminate\Http\Request;
use DB;
use Session;

class StaffController extends Controller
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
        if(!StaffController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        $info = staff::all();
        return view('staff.admin', compact('info', $info));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        if(!StaffController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        //condition to check Ts it null
        if($data->input('name') === null){
            echo "<script>alert('Please, fill first name')</script>";
            return redirect('/management');
        }
        else if($data->input('surname') === null){
            echo "<script>alert('Please, fill surname');</script>";
            return redirect('/admin_management');
        }
        else if($data->input('uname') === null){
            echo "<script>alert('Please, fill username');</script>";
            return redirect('/admin_management');
        }
        else if($data->input('pwd') === null){
            echo "<script>alert('Please, fill password');</script>";
            return redirect('/admin_management');
        }
        else if($data->input('role') === null){
            echo "<script>alert('Please, fill user role');</script>";
            return redirect('/admin_management');
        }

        //set data to array
        $staff = array(
            'fname' => $data->input('name'),
            'lname' => $data->input('surname'),
            'username' => $data->input('uname'),
            'role' => $data->input('role')
        );

        $user = array(
            'user_login' => $data->input('uname'),
            'pwd' => $data->input('pwd'),
            'role' => $data->input('role')
        );

        //insert array to DB
        DB::table('user')->insert($user);
        DB::table('staff')->insert($staff);

        //set message to alert
        $msgN = "Name: ".$staff['fname']." ".$staff['lname'];
        $msgU = "Username: ".$staff['username'];
        $msgR = "Role: ".$staff['role'];
        $msg = "is added";

        //alert and get a page
        echo '<script type="text/javascript">';
        echo 'alert("'.$msgN.'\n'.$msgU.'\n'.$msgR.'\n\n'.$msg.'");';
        echo 'window.location.href = "/admin_management";';
        echo '</script>';
    }

    //method to delete user
    public function delete(Request $data){
        if(!StaffController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        //temp data
        $staff = staff::where('staff_id', '=', $data->input('key'))->first();

        //delete data on DB
        staff::where('staff_id', '=', $data->input('key'))->delete();

        //set message to alert
        $msgN = "Name: ".$staff['fname']." ".$staff['lname'];
        $msgU = "Username: ".$staff['username'];
        $msgR = "Role: ".$staff['role'];
        $msg = "is deleted";

        //alert and get a page
        echo '<script type="text/javascript">';
        echo 'alert("'.$msgN.'\n'.$msgU.'\n'.$msgR.'\n\n'.$msg.'");';
        echo 'window.location.href = "/admin_management";';
        echo '</script>';
    }

    //method to search user
    public function staff_search(Request $data){
        if(!StaffController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         
        //condition to check searching key
        if($data->input('search-select')=="name")  
            $info = staff::where('fname', '=', $data->input('search-key'))->get();
        else if($data->input('search-select')=="sname")  
            $info = staff::where('lname', '=', $data->input('search-key'))->get();
        else if($data->input('search-select')=="username")  
            $info = staff::where('username', '=', $data->input('search-key'))->get();
        else if($data->input('search-select')=="role")  
            $info = staff::where('role', '=', $data->input('search-by-role'))->get();

        if($info->count() == 0){
            return view('staff.admin')
            ->with('check', false);
        }
        else{
            return view('staff.admin')
            ->with('info', $info);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(staff $staff)
    {
        //
    }
}