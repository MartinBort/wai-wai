<!DOCTYPE html>
<html>
	<head>
		<title>Wai-Wai</title>
	</head>
	<body>
		@include('layout.search')

		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>

		@endif

		@include('layout.navigation')
		@yield('content')
	</body>
</html>