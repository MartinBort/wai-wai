<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/gui.css') }}
		{{ HTML::style('css/menu-list.css') }}
	</head>

		<!-- checks if global message is included with redirect -->
		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>

		@endif
		<a href="{{ URL::route('home') }}"><img src="img/back-btn-black.png"></a>

		 <h2>{{ $user->username }}</h2><br>
		<i>My tagged spots:</i><br>

		
		@foreach ($user->spots->reverse() as $spots)
		<div class="row">
				<a href="{{ URL::route('view-spot', $spots->spot_id) }}">{{ $spots->spot_name }}</a> 
				<button class="view-spot-btn"><a href="{{ URL::route('edit-spot', $spots->spot_id) }}">Edit spot</a></button>
		</div>
		@endforeach
		

	</head>






