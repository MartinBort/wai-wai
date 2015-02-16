<!DOCTYPE html>
<html>
	<head>
		<title>Wai-Wai</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>

		<div id="map-canvas" style="height:450px;width:600px;"></div>

			<input type="hidden" id="lat" value="{{$lat}}" name="lat">
			<input type="hidden" id="lng" value="{{$lng}}" name="lng">


		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/directions.js') }}
		


	</body>
</html>