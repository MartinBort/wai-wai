<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<!-- normalize.css for resetting css across all browsers -->
		{{ HTML::style('css/normalize.min.css') }}
		<!-- custom css -->
		{{ HTML::style('css/home.css') }}
		{{ HTML::style('css/gui.css') }}
		<!-- favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
	</head>
	<body>
		@if(Session::has('global'))
			<p id="global"> {{ Session::get('global') }} </p>
		@endif

		
			<div>
				<div id="banner">
					<img id="logo" src="img/banner/logo.png">
					<a href="{{ URL::route('account-sign-in') }}"><button class="login-btn">Login</button></a>
				</div>
				<img id="hero" src="img/banner/home-banner.jpg">
			</div>

			<h2>Wai Wai. A treasure map for Tokyo</h2>
			<div class="btn-wrap">
				<a href="{{ URL::route('tell-me-more') }}">
					<button class="btn black-btn">Tell me more</button>
				</a>
				<a href="{{ URL::route('account-create') }}">
					<button class="btn yellow-btn">Sign me up!</button>
				</a>
			</div>
		


		{{ HTML::script('js/jquery-1.11.1.min.js') }}
	</body>
</html>