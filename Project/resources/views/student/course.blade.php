@extends('student.master')
@section('title','Course list')
@section('content')
<style>
    .choose{
        position:relative;
        padding: 20px;
        background-color: #f1f1f1;
        top :20px;
        border-radius:10px;
        width:50%; 
    }
    label{
        width:80%;
    }
    select{
        width:15%;
    }
</style>
<div class="container choose">
<label for="year">Year</label>
    <select id="year" name="year">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>

    <label for="year">Semester </label>
    <select id="semester" name="semester">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
</div>

@stop