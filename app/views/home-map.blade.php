<!DOCTYPE html>
<html>
	<head>
		<title>Wai-Wai</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>

		<div id="map-canvas" style="height:450px;width:600px;"></div>

		<form action="{{ URL::route('home-map-ajax') }}" method="get">
			<input type="hidden" id="lat" value="" name="lat">
			<input type="hidden" id="lng" value="" name="lng">
			{{ Form::token() }}
		</form>

		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/home-map.js') }}
		


	</body>
</html>