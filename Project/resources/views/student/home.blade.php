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
</style>

<h1 style="text-align:center; padding: 10px;" >My Timetable</h1>

<div class="container" style="overflow-x:auto;">
  <table>
    <tr>
      <th style="background-color:#ddd;"></th>
      <th style="background-color:#ddd;">8000-0930</th>
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





   <form action="search" method="post">
   <div class="container choose">
    <label for="year">Year</label>
      <select id="year" name="year">
      @if(isset($y))
      <option value="{{$y}}" hidden> {{$y}}</option>
      @endif
       <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
         <option value="4">4</option>
     </select>

    <label for="semester">Semester </label>
    <select id="semester" name="semester">
     @if(isset($s))
      <option value="{{$s}}" hidden> {{$s}}</option>
      @endif
      <option value="1">1</option>
      <option value="2">2</option>
    </select>

    <input class="btn" type="submit" value="Search">

    </div>
    {{ csrf_field() }}
   </form>

    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Subject ID</th>
                <th scope="col">Subject name</th>
                <th scope="col">Year</th>
                <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
          <?php $i=0;?>
            @if(isset($y) && isset($s))

            @foreach($subjects as $subject)
                <tr>
                    @if($subject->year==$y&&$subject->semester==$s)
                    <td>{{$subject->subj_id}}</a></td>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->year}}</td>
                    <td>{{$subject->semester}}</td>
                    <?php $i++; ?>
                    @endif
                </tr>
            @endforeach

            @if($i==0)
            <script>alert("No result");</script>
            @endif

            @endif
        </tbody>
    </table>


@stop