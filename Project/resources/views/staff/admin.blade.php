@extends('staff.staff_master')
<link rel="stylesheet" type="text/css" href="/css/staff_css/admin_style.css">
<script src="/js/jqury 3.3.1.js"></script>
<script src="/js/staff_script.js"></script>
@section('title', 'Admin Mangement')
@section('content')
	
	<!-- form to add new user -->
	<form method="post" action="/add_user" class="add">
		<b>{{trans('message.add_staff') }}</b><br/>
		<input type="text" name="name" placeholder="{{trans('message.staff_name')}}" class="input-val">
		<input type="text" name="surname" placeholder="{{trans('message.staff_surname')}}" class="input-val">
		<input type="text" name="uname" placeholder="{{trans('message.staff_uname')}}" class="input-val">
		<input type="password" name="pwd" placeholder="{{trans('message.staff_pwd')}}" class="input-val">
		<select name="role" class="select-role">
			<option value="" hidden>{{trans('message.role') }}</option>
			<option value="Staff">{{trans('message.role_staff') }}</option>
			<option value="Admin">{{trans('message.role_admin') }}</option>
		</select>
		<input type="submit" value="{{trans('message.submit') }}" class="submit">
		{{ csrf_field() }}
	</form>

	<hr id="form-line">

	<button class="btn-to-search" title="search user">search</button>

	<!-- area to show content -->
	<div class="content-wrapper">	
		@if(isset($check) && !$check)
				<div id="no-data">Not Found</div>
				<button id="reload" title="Reload page">reload</button>
		@else
			<table class="content-container">
				<tr>
					<th id="title-name">{{trans('message.a_name') }}</th>
					<th id="title-sur">{{trans('message.a_surname') }}</th>
					<th id="title-user">{{trans('message.a_username') }}</th>
					<th id="title-role">{{trans('message.role') }}</th>

					<hr id="title-line">
				</tr>

				@foreach($info as $i)
					<tr>
						<td class="data-name">{{$i->fname}}</td>
						<td class="data-sur">{{$i->lname}}</td>
						<td class="data-user">{{$i->username}}</td>
						<td class="data-role">{{$i->role}}</td>
						<td>
							<button class="btn-del" value="{{$i}}" title="Delete User">
								Del
							</button>
						</td>				
					</tr>
				@endforeach

			</table>
		@endif
	</div>

	<div class="popup-wrapper"></div>
	<div class="confirm-popup">
		<form method="post" action="/del_user">
			<div class="confirm-title">Are you sure to delete</div>

			<div class="confirm-info">
				<br/>&emsp;&emsp; Name: <b id="show_name"></b>
				<br/>&emsp;&emsp; Username: <b id="show_username"></b>
				<br/>&emsp;&emsp; Role: <b id="show_role"></b>
			</div>
			<input type="hidden" name="key" value="" id="key">
			
			<input type="submit" value="confirm" class="btn-confirm">
			<input type="button" value="cancel" class="btn-cancel">
		
			{{ csrf_field() }}			
		</form>
	</div>

	<div class="search-popup">
		<form method="post" action="/search_user">
			<select name="search-select" class="select-search">
				<option value="" hidden>search by</option>
				<option value="name">first name</option>
				<option value="sname">surname</option>
				<option value="username">username</option>
				<option value="role">role</option>
			</select>
			<br/>

			<select name="search-by-role" class="select-search-role" hidden>
				<option value="" hidden>select role</option>
				<option value="Staff">staff</option>
				<option value="Adminstator">admin</option>
			</select>

			<input type="text" name="search-key" class="data-search" placeholder="Enter data" hidden>
			<input type="submit" value="search" class="btn-search">
			<div id="search-cancel">cancel</div>
		
			{{ csrf_field() }}			
		</form>
	</div>
	
@stop