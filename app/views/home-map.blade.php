<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>

		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google maps API -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/home-map.css') }}
		{{ HTML::style('css/search-panel.css') }}
	</head>
	<body>
		
		<div id="map-canvas"></div>
		<div id="mapMask"></div>

		<div id="searchPanel">
			<div class="row"><button id="closeSearchPanel">close</button></div>
			<div class="row">
				<form action="{{ URL::route('search-tags') }}" method="GET">
					<input type="search">
				</form>
			</div>

		</div>

		<div id="menuPanel">
			<button id="closeMenuPanel">close</button>
			<ul>
				<li><a href="{{ URL::route('user-home') }}">My spots</a></li>
				<li>Favourites</li>
				<li>Account settings</li>
				<li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>
			</ul>
		</div>

		<button id="searchBtn" class="btnInstance">Search</button>	
		<button id="menuBtn" class="btnInstance">Menu</button>

				
		<form action="{{ URL::route('home-map-ajax') }}" method="get">
			<input type="hidden" id="lat" value="" name="lat">
			<input type="hidden" id="lng" value="" name="lng">
			{{ Form::token() }}
		</form>




		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/home-map.js') }}
		{{ HTML::script('js/menu-panel-slide.js') }}
		{{ HTML::script('js/search/search-panel-slide.js') }}
		
	</body>
</html>