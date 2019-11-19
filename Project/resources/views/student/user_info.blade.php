@extends('student.master')
@section('title','User info')
@section('content')

<style>
.edit{    
  background-color: #4CAF50;
  color: white;  
}

.container{
    position:relative;
    background-color:#f1f1f1;
    padding:20px;
    top:20px;
    border-radius:10px;

}

</style>


<div class="container">
    <h3>Student id : {{$student->std_id}}</h3>
    <h3>Name : {{$student->fname}}</h3>
    <h3>Last name : {{$student->lname}}</h3>
    <h3>Phone no : {{$student->phone_no}}</h3>
    <h3>Facebook contact : {{$student->fb_contact}}</h3>
    <h3>Address : {{$student->address}}</h3>

    <a href="/userEdit"><button class="btn btn-primary">Edit</button></a>
  </div>
@stop