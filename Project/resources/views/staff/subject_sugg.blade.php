@extends('staff.staff_master')
@section('title', 'Subbject Suggestion')
<link rel="stylesheet" type="text/css" href="{{asset('/css/staff_css/subject_sugg_style.css') }}">
<script src="/js/jqury 3.3.1.js"></script>
<script src="/js/suject_script.js"></script>

@section('content')

	<form method="post" action="subject_search" class="search-form">
			<b>{{trans('message.year') }}</b>
			<select name="year">
            @if(isset($y))
      			<option value="{{$y}}" hidden> {{$y}}</option>
     		 @endif
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			&nbsp&nbsp<b>{{trans('message.semester') }} </b>
			<select name="semester">
            @if(isset($s))
      			<option value="{{$s}}" hidden> {{$s}}</option>
      		@endif
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<input type="submit" name="search" value="{{trans('message.search') }}" id="btn-search">
            {{ csrf_field() }}
	</form>
	<hr id="subject-line">

	@if(isset($y))
		<form method="post" action="/subject_add" class="form-add">
			<span id="add-title">{{trans('message.add_subject') }}</span>
			<div class="add-input">
				@if(isset($y))
					<input type="text" name="year" value="{{$y}}" hidden>
					<input type="text" name="semester" value="{{$s}}" hidden>
				@endif
				<input type="text" name="subj_id" placeholder="{{trans('message.add_sub_id') }}">
				<input type="text" name="subj_name" placeholder="{{trans('message.add_sub_name') }}"> <br/>
				<input type="submit" name="submit" value="{{trans('message.submit') }}" id="btn-add">
			</div>

			{{ csrf_field() }}
		</form>
	@endif

	@if(isset($found) && !found)
		<div class="subject">
			<div id="no-data">Not Found</div>
		</div>
	@endif

	@if(isset($subjects))
		
		<div class="subject">
			<table class="content-container">
				<tr>
					<th id="subj-id">{{trans('message.subjectID') }}</th>
					<th id="subj-name">{{trans('message.subjectName') }}</th>

					<hr id="title-line">
				</tr>
			
				@foreach($subjects as $i)
					<tr>
						<td class="data-id">{{$i->subj_id}}</td>
						<td class="data-name">{{$i->name}}</td>
						<td>
							<button class="btn-del" value="{{ json_encode($i)}}" title="Delete Subject">
								Del
							</button>
						</td>				
					</tr>
				@endforeach

			</table>
		</div>

	@endif
	

	<div class="popup-wrapper"></div>
	<div class="confirm-popup">
		<form method="post" action="/del_subject">
			<div class="confirm-title">Are you sure to delete</div>

			<div class="confirm-info">
				<br/>&emsp;&emsp; Year: <b id="show_yaer"></b>
				&emsp;&emsp; Semester: <b id="show_semester"></b>
				<br/>&emsp;&emsp; Subject ID: <b id="show_subj_id"></b>
				<br/>&emsp;&emsp; Subject Name: <b id="show_subj_name"></b>
			</div>
			<input type="hidden" name="id_key" value="" id="id-key">
			<input type="hidden" name="year_key" value="" id="year-key">
			<input type="hidden" name="sem_key" value="" id="sem-key">
	
			<input type="submit" value="confirm" class="btn-confirm">
			<input type="button" value="cancel" class="btn-cancel">
		
			{{ csrf_field() }}			
		</form>
	</div>

@stop