<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //controller to control staff mode route

      public function checkLogin(){
         if(Session::has('role')) return true;
         else return false;
      }

      public function index(){
         if(!indexController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

         $user_login = Session::get('user');
         $user = DB::table('staff')->where('username', '=', $user_login)->first();
         return view('staff.index', compact('user', $user));       
   	}

      public function user_edit(){
         if(!indexController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

         $user_login = Session::get('user');
         $user = DB::table('staff')->where('username', '=', $user_login)->first();
         return view('staff.user_edit', compact('user', $user));
      }

      public function configuration(Request $info){
         if(!indexController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         
         $user_login = Session::get('user');
         $check_pwd = DB::table('user')->where('user_login', '=', $user_login)->first();


         if( $check_pwd->pwd==$info->input('pwd') ){

            if( $info->input('new_pwd')==$info->input('confirm-pwd') ){
               
               if( $info->input('new_pwd')=="" ){
                  $data = array(
                     'fname' => $info->input('name'),
                     'lname' => $info->input('surname'),
                     'username' => $info->input('username')
                  );
                  
                  DB::table('staff')->where('username', '=', $user_login)->update($data);


               }
               else{
                  $data = array(
                     'fname' => $info->input('name'),
                     'lname' => $info->input('surname'),
                     'username' => $info->input('username'),
                  );

                  $pwd = $info->input('new_pwd');

                  DB::table('staff')->where('username', '=', $user_login)->update($data);
                  DB::table('user')->where('user_login', '=', $user_login)->update(['pwd'=>$pwd]);
               }

               

               echo "<script>alert('update successfully!');";
               echo 'window.location.href = "/";</script>';
            }
            else{
               echo "<script>alert('New password does not match!');";
               echo 'window.location.href = "/user_edit";</script>';
            }
            
         }
         else{
            echo "<script>alert('Incorrect password!');";
            echo 'window.location.href = "/user_edit";</script>';
         }

         
      }
}
