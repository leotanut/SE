@extends('staff.staff_master')
@section('title', 'STAFF MODE')
<link rel="stylesheet" type="text/css" href="{{asset('/css/staff_css/user_edit_style.css') }}">
@section('content')

	<form method="post" action="/configuration" class="edit-form">
		<div class="title">{{trans('message.a_name') }}</div>
		<input type="text" name="name" value="{{$user->fname}}" placeholder="{{trans('message.saff_name') }}">

		<div class="title">{{trans('message.a_surname') }}</div>
		<input type="text" name="surname" value="{{$user->lname}}" placeholder="{{trans('message.staff_surname') }}">

		<div class="title">{{trans('message.a_username') }}</div>
		<input type="text" name="username" value="{{$user->username}}" placeholder="{{trans('message.staff_uname') }}">

		<div class="title">{{trans('message.a_new_pwd') }}</div>
		<input type="password" name="new_pwd" placeholder="{{trans('message.staff_new_pwd') }}">
		<input type="password" name="confirm-pwd" placeholder="{{trans('message.staff_new_pwd') }}">

		<div class="pwd">
			<input type="password" name="pwd" placeholder="{{trans('message.staff_pwd') }}">
		</div>
		<div class="submit">
			<input type="submit" value="submit" id="btn-submit">
		</div>
		
		{{ csrf_field() }}
	</form>
	
@stop