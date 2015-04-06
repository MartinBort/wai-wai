<!DOCTYPE html>
<html>
	<head>
		<title>Tag a Spot!</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<!-- normalize.css for resetting css across all browsers -->
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/tag-spot.css') }}
	</head>
	<body>

		<!--{{ Auth::user()->username }}-->
		<div id="top-bar">
			<a href="{{ URL::route('home') }}">&#60;Return to map</a>
		</div>

		<div id="map-canvas"></div>
		<form action="{{ URL::route('create-spot') }}" method="post">

			<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

			<input type="hidden" id="lat" value=<?php echo '"'+$lat+'"' ?> name="lat">
			<input type="hidden" id="lng" value=<?php echo '"'+$lng+'"' ?> name="lng">

			<p>Name the Spot: <input type="text" name="spot_name" {{ (Input::old('spot_name')) ? ' value="' . e(Input::old('spot_name')) .'" ' : ' ' }}></p>
			<span style="color:red">
				@if($errors->has('spot_name'))
					{{ $errors->first('spot_name')}}
				@endif
			</span>

			<p>Add a tag: <input type="text" id="input-tag"><button onClick="return false;" id="addtag">+</button></p>
			<div id="tagsbox"></div>

			<p>Location notes: <input type="textarea" name="location_notes" {{ (Input::old('location_notes')) ? ' value="' . e(Input::old('location_notes')) .'" ' : ' ' }}></p>

			<p>Comments: <input type="textarea" name="comments" {{ (Input::old('comments')) ? ' value="' . e(Input::old('comments')) .'" ' : ' ' }}></p>

			<!--
			<p>Add a photo?: <input type="file" name="photo" accept="image/x-png, image/jpeg" {{ (Input::old('photo')) ? ' value="' . e(Input::old('photo')) .'" ' : ' ' }}></p>
			-->

			<input type="submit" value="Create spot">

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