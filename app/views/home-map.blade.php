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
		{{ HTML::style('css/home-map.css') }}
		{{ HTML::style('css/search-panel.css') }}
	</head>
	<body>
		
		<div id="map-canvas"></div>
		<div id="mapMask"></div> <!-- covers map-canvas when menu is toggled -->

		<!-- search panel -->
		<div id="searchPanel">
			<div class="row">
				<div id="closeSearchPanel"><img src="img/x-btn-white.png"></div>
			</div>
			<div class="row">
				<form action="{{ URL::route('search-tags') }}" method="GET">
					<input type="search" id="searchBox" placeholder="search for tags...">
				</form>				
			</div>
			<!-- search toggle
			<div class="row">
				 
				<button>Spots</button><button>Tags</button>
			</div>
			-->
			<div id="searchResults"></div>
		</div>

		<!-- menu panel -->
		<div id="menuPanel">
			<div id="closeMenuPanel"><img src="img/x-btn-grey.png"></div>
				<div class="profileMenuBtnWrapper">
					<a href="{{ URL::route('user-home') }}"><button class="profileMenuBtn">My spots</button></a>
					<button class="profileMenuBtn">Favourites</button>
					<button class="profileMenuBtn">Account settings</button>
					<a href="{{ URL::route('account-sign-out') }}"><button class="profileMenuBtn sign-out-btn">Sign out</button></a>
				</div>
		</div>

		<!-- menu buttons -->
		<div id="searchBtn" class="btnInstance"><div class="circle"><img src="img/search-icon.png"></div></div>	
		<div id="menuBtn" class="btnInstance"><div class="circle"><img src="img/profile-icon.png"></div></div>

				
		<form action="{{ URL::route('home-map-ajax') }}" method="get">
			<input type="hidden" id="lat" value="" name="lat">
			<input type="hidden" id="lng" value="" name="lng">
			{{ Form::token() }}
		</form>




		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/home-map.js') }}
		{{ HTML::script('js/menu-panel-slide.js') }}
		{{ HTML::script('js/search/search-panel-slide.js') }}
		{{ HTML::script('js/search/searchtags.js') }}
		
	</body>
</html>