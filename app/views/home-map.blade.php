<!DOCTYPE html>
<html>
	<head>
		<title>Wai-Wai</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/home-map.css') }}
	</head>
	<body>

		<div id="map-canvas"></div>
		<div id="user-btn" class="menu-btn">
			<a href="{{ URL::route('user-home') }}">My Profile</a>
		</div>
		<div id="settings-btn" class="menu-btn">
			<a href="{{ URL::route('account-sign-out') }}">Sign out</a>
		</div>

						
		<form action="{{ URL::route('home-map-ajax') }}" method="get">
			<input type="hidden" id="lat" value="" name="lat">
			<input type="hidden" id="lng" value="" name="lng">
			{{ Form::token() }}
		</form>
		

		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/home-map.js') }}
		
	</body>
</html>