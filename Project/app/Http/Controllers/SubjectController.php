<?php

namespace App\Http\Controllers;

use App\subject;
use Illuminate\Http\Request;
use DB;
use Session;


class SubjectController extends Controller
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
        if(!SubjectController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }

        if(Session::get('role')=="student"){
            $subjects = subject::all();
            return view('subject.index',compact('subjects',$subjects));
        }
        else return view('staff.subject_suggesstion');
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
    public function store(Request $request)
    {
        //
    }

    public function search(Request $request){
        if(!SubjectController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         

        $y=$request->get('year');
        $s=$request->get('semester');
        $subjects = DB::table('suggest_subject')
        ->where('year', '=', $y, 'AND', 'semester', '=', $s)->get();
        
        return view('student.course')
        ->with('y', $y)
        ->with('s',$s )
        ->with('subjects',$subjects);
        
    }

    public function subject_search(Request $request){
        if(!SubjectController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         

        $y=$request->get('year');
        $s=$request->get('semester');
        
        $subjects = DB::table('suggest_subject')
        ->where('year', '=', $y, 'AND', 'semester', '=', $s)->get();

        return view('staff.subject_sugg')
        ->with('y',$y)
        ->with('s',$s)
        ->with('subjects', $subjects);
    }

    public function subject_add(Request $data){
        if(!SubjectController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         

        $subject = array(
            'year' => $data->input('year'),
            'semester' => $data->input('semester'),
            'name' => $data->input('subj_name'),
            'subj_id' => $data->input('subj_id')
        );

        DB::table('suggest_subject')->insert($subject);
       
        $y = $subject['year'];
        $s = $subject['semester'];
        $subjects = DB::table('suggest_subject')
        ->where('year', '=', $y, 'AND', 'semester', '=', $s)->get();

        return view('staff.subject_sugg')
        ->with('y',$y)
        ->with('s',$s)
        ->with('subjects', $subjects);
    }

    public function subject_del(Request $data){
        if(!SubjectController::checkLogin()){
            echo '<script>alert("Please, Login!");';
            echo 'window.location.href = "/";</script>';
         }
         

        $id = $data->input('id_key');
        $y = $data->input('year_key');
        $s = $data->input('sem_key');

        //delete data on DB
        DB::table('suggest_subject')->where('subj_id', '=', $id)->delete();

        //selext data on DB
        $subjects = DB::table('suggest_subject')
        ->where('year', '=', $y, 'AND', 'semester', '=', $s)->get();

        return view('staff.subject_sugg')
        ->with('y',$y)
        ->with('s',$s)
        ->with('subjects', $subjects);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        //
    }
}
