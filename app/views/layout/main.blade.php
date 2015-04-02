<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Google CDN provided JQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- normalize.css for resetting css across all browsers -->
		{{ HTML::style('css/normalize.min.css') }}

	</head>
	<body>

		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>

		@endif

		<!-- Content is generated from blade which extends this main.blade -->
		@yield('content')

	</body>
</html>