<!DOCTYPE html>
<html>
	<head>
		<title>View Spot</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>
		<h1><i>{{$spot->spot_name}}</i></h1>
		
		<div id="map-canvas" style="height:200px;width:300px;"></div>


			<input type="hidden" name="spot_id" value="{{$spot->spot_id}}">
			<input type="hidden" id="lat" value="{{$spot->latitude}}">
			<input type="hidden" id="lang" value="{{$spot->longitude}}">

			<p>Spot name: <input type="text" name="spot_name" value="{{$spot->spot_name}}" readonly></p>

			<p>Location notes: <textarea readonly>{{$spot->location_notes}}</textarea></p>

			<p>Comments: <textarea readonly>{{$spot->comments}}</textarea></p>			

			<!-- TODO get view-directions working -->
			<a href="{{ URL::route('view-directions', $spot->latitude, $spot->longitude) }}">View directions</a>
			<a href="{{ URL::previous() }}">Back</a>
			
			{{ Form::token() }}
	
		{{ HTML::script('js/fetch-location.js') }}
	</body>
</html>