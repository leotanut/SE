<?php 
/*
    0800 = left 0   
    0930 = left 138
    1100 = left 277
    1300 = left 416
    1430 = left 555
    1600 = left 694
    1730 = left 833
    1900 = left 972 

    M = top 0
    Tu = top 65
    We = top 130 left 92(0900) width 277
    Th = top 195
    F = top 260
    Sat = top 325
    Sun = top 390
*/
?>

@extends('student.master')
@section('title','Home')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  
  border: 1px solid #ddd;
 width: 100%;
}
th, td {
  border: 1px solid #ddd;
  text-align: center;
  padding: 20px 1px 20px 1px;
  width:11%;
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
.subject_wraper{
    position: absolute;
    top: 231px;
    left: 189px;
    height: 455px;
    width: 1111px;
    /*background-color: yellow;*/


}

.del{
  position: absolute;
  right: 5px;
  cursor: pointer;
  font-size: 13px;
  color: black;
}

.del:hover{
  transform: scale(1.4);
}

.subject{
  position:absolute;
  text-align:center;
  
  height:65px;
  width: 138px;
  font-size:14px;

  border-collapse: collapse;
  border-spacing: 0;
  
  border: 1px solid #ddd;

}

</style>


<h1 style="text-align:center; padding: 10px;" >My Timetable</h1>
<div class="container" style="min-width:1280px; max-width:1280px;">
  

  <div class="subject_wraper">
  <?php 
    $index = 0;
    $color = array('#A4C8F0','#6699AA','#FFFF88','#E1FD8E','#CBAB8D','#FDB4BF','#F9A484','#FFBE7D','#D0B3E1','#B3B3D9');
  ?>
  @foreach($enroll as $i)
    @if($i->day == "M,Th")

      @if($i->start_time == 800)

        <div class="subject" style="top:0px; left:0px; background-color: <?php echo $color[$index]; ?>;">
         <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        

        <div class="subject" style="top:195px; left:0px; background-color: <?php echo $color[$index]; ?>;">

       <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 930)

       

        <div class="subject" style="top:0px; left:138px; background-color: <?php echo $color[$index]; ?>;">
        <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

      

        <div class="subject" style="top:195px; left:138px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  


      @elseif($i->start_time == 1100)

        <div class="subject" style="top:0px; left:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:195px; left:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1300)

        <div class="subject" style="top:0px; left:416px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:195px; left:416px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div> 

      @elseif($i->start_time == 1430)

        <div class="subject" style="top:0px; left:555px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:195px; left:555px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1600)

        <div class="subject" style="top:0px; left:694px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:195px; left:694px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1730)

        <div class="subject" style="top:0px; left:833px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:195px; left:833px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1900)

        <div class="subject" style="top:0px; left:972px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:195px; left:972px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  
      @endif
<!--//if Tu,F -->
    @elseif($i->day == "Tu,F")

      @if($i->start_time == 800)

        <div class="subject" style="top:65px; left:0px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:260px; left:0px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 930)

        <div class="subject" style="top:65px; left:138px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:260px; left:138px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  


      @elseif($i->start_time == 1100)

        <div class="subject" style="top:65px; left:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:260px; left:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1300)

        <div class="subject" style="top:65px; left:416px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:260px; left:416px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div> 

      @elseif($i->start_time == 1430)

        <div class="subject" style="top:65px; left:555px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:260px; left:555px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1600)

        <div class="subject" style="top:65px; left:694px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:260px; left:694px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1730)

        <div class="subject" style="top:65px; left:833px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


        <div class="subject" style="top:260px; left:833px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  

      @elseif($i->start_time == 1900)

        <div class="subject" style="top:65px; left:972px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>

        <div class="subject" style="top:260px; left:972px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>  
      @endif
      <!--//if Tu,F -->
    @elseif($i->day == "We")
      @if($i->start_time == 900)

      <div class="subject" style="top:130px; left:92px; width:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>
      @elseif($i->start_time == 1300)

      <div class="subject" style="top:130px; left:416px; width:277px; background-color: <?php echo $color[$index]; ?>;">
  <a href="/del/{{$i->subj_id}}">
          <span class="del" title="Delete subject">x</span>
        </a>
        {{$i->subj_id}} <br>
        {{$i->name}} <br>
        sec {{$i->section}}
        </div>


    @endif 
   @endif

  <?php $index++ ?>
  @endforeach
  </div>
  
 
 
 
 
 
 
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