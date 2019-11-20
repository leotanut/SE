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
    .btn{
        background-color: #4CAF50;
        color: white;
        width:100%;
    }
</style>
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