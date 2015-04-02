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
	</head>
	<body>
		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>
		@endif

		<div id="wrapper">
			<div>
				<div id="banner">
					<img id="logo" src="img/banner/logo.png">
					<a href="{{ URL::route('account-sign-in') }}">login</a>
				</div>
				<img id="hero" src="img/banner/home-banner.jpg">
			</div>

			<h2>Wai Wai. A treasure map for Tokyo</h2>
			<div class="btn-wrap">
				<a href="">
					<button class="btn">Tell me more</button>
				</a>
				<a href="{{ URL::route('account-create') }}">
					<button class="btn">Sign me up!</button>
				</a>
			</div>
		</div>


		{{ HTML::script('js/jquery-1.11.1.min.js') }}
	</body>
</html>