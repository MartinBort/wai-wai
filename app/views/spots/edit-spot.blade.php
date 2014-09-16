<!DOCTYPE html>
<html>
	<head>
		<title>Edit Spot</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>
		<h1><i>Edit Spot {{$spot->spot_name}}</i></h1>
		
		<div id="map-canvas" style="height:200px;width:300px;"></div>

		<form action="{{ URL::route('edit-spot-post') }}" method="post">

			<input type="hidden" name="spot_id" value="{{$spot->spot_id}}">
			<input type="hidden" id="lat" value="{{$spot->latitude}}">
			<input type="hidden" id="lang" value="{{$spot->longitude}}">

			<p>Spot name: <input type="text" name="spot_name" value="{{$spot->spot_name}}"></p>

			<p>Location notes: <input type="textarea" name="location_notes" value="{{$spot->location_notes}}"></p>

			<p>Comments: <input type="textarea" name="comments" value="{{$spot->comments}}"></p>			

			<input type="submit" value="Save Changes">
			<a href="{{ URL::route('user-home') }}">Cancel</a><br><br><br>
			<a href="{{ URL::route('delete-spot', $spot->spot_id) }}" onClick="confirm('Click OK to delete spot')">Delete spot</a>

			{{ Form::token() }}

		</form>
	
		{{ HTML::script('js/fetch-location.js') }}
	</body>
</html>