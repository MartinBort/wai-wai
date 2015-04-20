<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- gmaps -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/view-spot.css') }}
		{{ HTML::style('css/gui.css') }}
	</head>
	<body>
		<div id="top-bar">
				<a href="{{ URL::previous() }}"><img src="../img/back-btn-white.png"></a>
			</div>
		<div id="map-canvas"></div>
		<h1 id='spot-title'><i>{{$spot->spot_name}}</i></h1>
		
		<form action="{{ URL::route('edit-spot-post') }}" method="post">
				<h2>Edit spot</h2>

				<input type="hidden" name="spot_id" value="{{$spot->spot_id}}">
				<input type="hidden" id="lat" value="{{$spot->latitude}}">
				<input type="hidden" id="lng" value="{{$spot->longitude}}">

				<p>Spot name: </p>
				<input id="edit-name" type="text" name="spot_name" value="{{$spot->spot_name}}">

				<p>Notes: </p>
				<input id="edit-notes" type="textarea" name="comments" value="{{$spot->comments}}">

				<input type="submit" value="Save Changes" class="btn black-btn">
				{{ Form::token() }}

			</form>		

		<button class="btn red-btn">
			<a href="{{ URL::route('delete-spot', $spot->spot_id) }}" onClick="confirm('Click OK to delete spot')">Delete spot</a>
		</button>
	
		{{ HTML::script('js/fetch-location.js') }}
	</body>
</html>