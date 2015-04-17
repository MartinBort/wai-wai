<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>	
		<!-- Google maps API -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/search-results.css') }}
		{{ HTML::style('css/gui.css') }}		
	</head>
	<body>

		<div id="map-wrapper">
			<div id="top-bar">
				<a href="{{ URL::route('home') }}"><img src="../img/back-btn-white.png"></a>
			</div>
			<div id="map-canvas"></div>
		</div>

		<div id="results-box">	
		@foreach ($data as $spot)
				<div class="result">
							<h2 class="title">{{ $spot->spot_name }}</h2> 
							<i>{{ $spot->tag_name }}</i>
							
								<button class="view-spot-btn">
									<a href="{{ URL::route('view-spot', $spot->spot_id) }}">View spot</a>
								</button>
							
							<input type="hidden" class="lat" value="{{ $spot->latitude }}" name="lat">
							<input type="hidden" class="lng" value="{{ $spot->longitude }}" name="lng">
							<input type="hidden" class="spot-name" value="{{ $spot->spot_name }}">
							<input type="hidden" class="spot-url" value="{{ URL::route('view-spot', $spot->spot_id) }}">
						
				</div>				
		@endforeach
		</div>

	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/search/results-tags-spots.js') }}	
	</body>


