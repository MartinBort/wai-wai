<!DOCTYPE html>
<html>
	<head>
		<title>Tag a Spot!</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- gmaps -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<!-- normalize.css for resetting css across all browsers -->
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/tag-spot.css') }}
		{{ HTML::style('css/gui.css') }}
	</head>
	<body>

		<!--{{ Auth::user()->username }}-->
		<div id="top-bar">
			<a href="{{ URL::route('home') }}"><img src="../img/back-btn-white.png">Return to map</a>
		</div>

		<div id="map-canvas"></div>
		<form action="{{ URL::route('create-spot') }}" method="post">

			<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
			<input type="hidden" id="lat" value=<?php echo '"'+$lat+'"' ?> name="lat">
			<input type="hidden" id="lng" value=<?php echo '"'+$lng+'"' ?> name="lng">

			<p>Spot title: </p>
			<input type="text" placeholder="Name the spot" id="spot-name-input" name="spot_name" {{ (Input::old('spot_name')) ? ' value="' . e(Input::old('spot_name')) .'" ' : ' ' }}>
			<span style="color:red">
				@if($errors->has('spot_name'))
					{{ $errors->first('spot_name')}}
				@endif
			</span>
			
			<div id="tagsbox"></div>
			
	
			<p>Add tags</p>
			<input type="text" placeholder="eg. 'cafe', 'gallery'" id="input-tag"><button onClick="return false;" id="addtag">+</button>

			

			<!--
			<p>Location notes: <input type="textarea" name="location_notes" {{ (Input::old('location_notes')) ? ' value="' . e(Input::old('location_notes')) .'" ' : ' ' }}></p>
			-->

			<p>Notes</p>
			<input type="textarea" placeholder="Tell us about it" id="comments-area" name="comments" {{ (Input::old('comments')) ? ' value="' . e(Input::old('comments')) .'" ' : ' ' }}>

			<!--
			<p>Add a photo?: <input type="file" name="photo" accept="image/x-png, image/jpeg" {{ (Input::old('photo')) ? ' value="' . e(Input::old('photo')) .'" ' : ' ' }}></p>
			-->

			<div>
				<input type="submit" value="Create spot" class="btn yellow-btn">
			</div>
			{{ Form::token() }}

		</form>

		<!-- debug tag js
		<button id="showArr">Click</button>
		-->

		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/tag-current-location.js') }}
		{{ HTML::script('js/add-tags.js') }}

	</body>
</html>