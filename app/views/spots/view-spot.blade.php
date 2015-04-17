<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/view-spot.css') }}
		{{ HTML::style('css/gui.css') }}

		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>
		
		<div id="top-bar">
				<a href="{{ URL::previous() }}"><img src="../img/back-btn-white.png"></a>
				<img id="heart" src="../img/heart-empty.png">
			</div>
		<div id="map-canvas"></div>

		<h1><i>{{$spot->spot_name}}</i></h1>


		<input type="hidden" id="spot_id" value="{{$spot->spot_id}}">
		<input type="hidden" id="lat" value="{{$spot->latitude}}">
		<input type="hidden" id="lng" value="{{$spot->longitude}}">

		<!-- {{Auth::user()->id}} -->
		<div id="comments">
			<h3>Comments: </h3>
			<p>{{$spot->comments}}</p>
		</div>			

		<!-- TODO get view-directions working 
		<a href="{{ URL::route('view-directions', $spot->latitude, $spot->longitude) }}">View directions</a>
		<a href="{{ URL::previous() }}">Back</a> -->
			
		{{ Form::token() }}



		<!-- JQuery -->
		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		<!-- map js -->
		{{ HTML::script('js/view-spot.js') }}
	</body>
</html>