<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class loginController extends Controller
{
   public function checkLogin(){
         if(Session::has('role')) return true;
         else return false;
   }

    //controller to control staff mode route
   public function login(Request $login){
      $user = $login->input('user_login');
      $pwd = $login->input('pwd');
   
      $check = DB::table('user')->where('user_login', '=', $user)->first();

      if($check === null){
         $login_fail = 1;
      }else{
         if($pwd == $check->pwd) {

            Session::put('user', $check->user_login);
            Session::put('role', $check->role);

            $login_fail = 0;
         }
         else $login_fail = 1;
      }

      if($login_fail==1) echo "<script>alert('Login fail!');</script>";

      echo '<script>window.location.href = "/"</script>'; 
      
   }

   public function logout(){
      if(!loginController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
      }
      
      Session::flush();

  		echo '<script>window.location.href = "/";</script>';
   }
}