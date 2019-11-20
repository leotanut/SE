<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;

class pagesController extends Controller
{
   public function student(){
      if(!pagesController::checkLogin()){
         pagesController::login();
      }
      
      $user = Session::get('user');
      $enroll = DB::table('enroll')
      ->where('enroll.username','=',$user)
      ->leftjoin('subjects',function($join)
      {
         $join->on('subjects.subj_id','=','enroll.subj_id');
         $join->on('subjects.section','=','enroll.section');
      })
      ->get();

      return view('student.home')
      ->with('enroll',$enroll);
      
   }

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

      function show_course(){
         if(!pagesController::checkLogin()){
            pagesController::login();
         }

         return view('student.course');
      }
}
