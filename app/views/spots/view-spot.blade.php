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
				<img id="heart" src="../img/heart-empty.png">
			</div>
		<div id="map-canvas"></div>

		<h1 id='spot-title'><i>{{$spot->spot_name}}</i></h1>


		<div id='content-wrapper'>
			<p id='tagged-by'>Tagged by <i>{{$spot->user_name}}</i></p> 

			<div>Tags
				@foreach ($spot['tags'] as $tag)
				<span class='tag'>{{$tag->tag_name}}</span>
				@endforeach
			</div>

			<!-- {{Auth::user()->id}} -->
			<div id="notes">
				<h3>Spot notes: </h3>
				<p>{{$spot->comments}}</p>
			</div>
		</div>


		<button class="btn yellow-btn">View on map</button>

		<input type="hidden" id="spot_id" value="{{$spot->spot_id}}">
		<input type="hidden" id="lat" value="{{$spot->latitude}}">
		<input type="hidden" id="lng" value="{{$spot->longitude}}">		

		<!-- TODO get view-directions working 
		<a href="{{ URL::route('view-directions', $spot->latitude, $spot->longitude) }}">View directions</a>
		<a href="{{ URL::previous() }}">Back</a> -->
			
		<!-- {{ Form::token() }} -->



		<!-- JQuery -->
		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		<!-- map js -->
		{{ HTML::script('js/view-spot.js') }}
	</body>
</html>