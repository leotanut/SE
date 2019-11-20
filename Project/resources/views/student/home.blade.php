@extends('student.master')
@section('title','Home')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
 
}
th, td {
  border: 1px solid #ddd;
  text-align: center;
  padding: 20px 1px 20px 1px;
}
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
        width:19%;
    }
    .btn{
        background-color: #4CAF50;
        color: white;
        width:100%;
    }

    * {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}    
</style>

{{$enroll}}
<h1 style="text-align:center; padding: 10px;" >My Timetable</h1>

<div class="container" style="overflow-x:auto;">
  <table>
    <tr>
      <th style="background-color:#ddd;"></th>
      <th style="background-color:#ddd;">0800-0930</th>
      <th style="background-color:#ddd;">0930-1100</th>
      <th style="background-color:#ddd;">1100-1230</th>
      <th style="background-color:#ddd;">1300-1430</th>
      <th style="background-color:#ddd;">1430-1600</th>
      <th style="background-color:#ddd;">1600-1730</th>
      <th style="background-color:#ddd;">1730-1900</th>
      <th style="background-color:#ddd;">1900-2030</th>
    </tr>
    <tr>
      <th style="background-color:#ddd;">MONDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
    <tr>
      <th style="background-color:#ddd;">TUESDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
     
    </tr>
    <tr>
      <th style="background-color:#ddd;">WEDNESDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>

      
    </tr>
    <tr>
      <th style="background-color:#ddd;">THURSDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
    <tr>
      <th style="background-color:#ddd;">FRIDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
    <tr>
      <th style="background-color:#ddd;">SATURDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
    <tr>
      <th style="background-color:#ddd;">SUNDAY</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</div>


<div class ="container">
<h2 style="text-align:center; padding: 10px;" >Add Course</h2>
<form action="addSearch" method="post">
<input type="text" id="myInput" name="subj_id" placeholder="Please enter SUBJECT ID here...">
<input type="submit" class="btn" value="Search"> 

{{csrf_field()}}
</form>
@if(isset($subjects))
<table id="myTable">
  <tr class="header">
    <th style="width:15%;">Course ID</th>
    <th style="width:40%;">Name</th>
    <th style="width:10%">Section</th>
    <th style="width:15%">Date</th>
    <th style="width:15%">Time</th>
    <th style="width:5%"></th>

  </tr>
  <form action="enroll" method="post">
  @foreach($subjects as $subject)
  <tr>
    <td>{{$subject->subj_id}}</td>
    <td>{{$subject->name}}</td>
    <td>{{$subject->section}}</td>
    <td>{{$subject->day}}</td>
    <td>{{$subject->start_time.'-'.$subject->end_time}} </td>
    <input type="text" name ="subj_id" value="{{$subject->subj_id}}" hidden>
    <input type="text" name ="name" value="{{$subject->name}}" hidden>
    <input type="text" name ="section" value="{{$subject->section}}" hidden>
    <input type="text" name ="day" value="{{$subject->day}}" hidden>
    <input type="text" name ="start_time" value="{{$subject->start_time}}" hidden>
    <input type="text" name ="end_time" value="{{$subject->end_time}}" hidden>
    <td><input type="submit" class ="btn" value="ADD"></td>
  </tr>
  @endforeach
</table>
@endif
{{csrf_field()}}
</form>


</div>


@stop