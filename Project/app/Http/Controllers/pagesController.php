<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class pagesController extends Controller
{

   public function checkLogin(){
         if(Session::has('role')) return true;
         else return false;
   }

    //controller to control staff mode route
      function login(){
         return view('index');
      }

      function subject_suggestion(){
         if(!pagesController::checkLogin()){
            pagesController::login();
         }

         return view('staff.subject_sugg');
      }

      function student_info(){
         if(!pagesController::checkLogin()){
            pagesController::login();
         }

         return view('staff.student_info');
      }
}
