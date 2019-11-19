<?php

use Illuminate\Support\Facades\DB;
$user = DB::table('staff')->where('username', '=', Session::get('user'))->first();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel = "shortcut icon" type = "image/png" href ="{{asset('/img/icon_img.png') }}" > 
		<link rel="stylesheet" type="text/css" href="{{asset('/css/staff_css/master_style.css') }}">
		<title>@yield('title')</title>
	</head>

	<body>
		<!-- Menu -->
		<div class = "menu">
			<ul>
				<a href="{{URL::to('management') }}">
					<div class="home-wrapper">
						<img id="home-img" src="{{asset('/img/home.png')}}">
						<b><span id="font-home">{{trans('message.home')}}</span></b>
					</div>
				</a>
				<div class="lang-wrapper">
					<a href="{{ URL::to('change/th') }}">
						<span class="lang" title="{{trans('message.thai') }}">TH</span>
					</a>
					<span id="bar">|</span>
					<a href="{{ URL::to('change/en') }}">
						<span class="lang" title="{{trans('message.eng') }}">ENG</span>					
					</a>
				</div>

				<!-- menu title -->
				<div id="user-name">{{$user->username}}</div>
				@if($user->role === "Admin")
					<div id="role">{{trans('message.admin') }}</div>
				@elseif($user->role === "Staff")
					<div id="role">{{trans('message.staff') }}</div>
				@endif
				<hr id="line">
				
				<!-- list of menu -->
				@if($user->role === "Admin")
					<a href="{{URL::to('admin_management') }}">
						<li>
							<img class="a-img" src="{{asset('/img/config.png') }}">
							<span class = "font">
								{{trans('message.admin') }}				
							</span>
						</li>
					</a>
				@endif
				<a href="{{URL::to('student_info') }}">
					<li>
						<img class="a-img" src="{{asset('/img/student.png') }}">
						<span class = "font">
							{{trans('message.student') }}
						</span>
					</li>
				</a>
				<a href="{{URL::to('subject_suggestion') }}">
					<li>
						<img class="b-img" src="{{asset('/img/subject.png') }}">
						<span class = "font">
							{{trans('message.subject') }}
						</span>
					</li>
				</a>
				<a href="{{URL::to('/logout') }}">
					<li class = "logout-wrapper">
					<img class="b-img" src="{{asset('/img/logout.png') }}">
						<span class = "font">
							{{trans('message.logout') }}
						</span>
					</li>
				</a>
			</ul>

		</div>

		<div class="content">
			@yield('content')
		</div>
		
	</body>

	<footer></footer>
</html>