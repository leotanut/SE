@extends('student.master')
@section('title','userEdit')
@section('content')
<style>
    /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */  
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container{  
  border-radius: 5px;
  padding: 20px ;
  width:50%;
}
</style>

<div class="container">
  <form method="post" action="/studentEdit">
    
    <input type="text" name="std_id" value="{{$info['std_id']}}" hidden>
    
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" value="{{$info['fname']}}">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" value="{{$info['lname']}}">

    <label for="phoneNo">Phone number</label>
    <input type="text" id="phone_no" name="phone_no" value="{{$info['phone_no']}}">

    <label for="fbContact">Facebook contact</label>
    <input type="text" id="fb_contact" name="fb_contact" value="{{$info['fb_contact']}}">

    <label for="address">Address</label>
    <textarea id="address" name="address">{{$info['address']}}</textarea>

    <input type="submit" value="Submit">
    {{ csrf_field() }}

  </form>

</div>
@stop