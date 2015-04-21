<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/gui.css') }}
		{{ HTML::style('css/menu-list.css') }}
	</head>

		<a href="{{ URL::route('home') }}"><img src="img/back-btn-black.png"></a>

		 <h2>Favourites</h2>

		
		@foreach ($favourites as $favourite)
		<div class="row">
			
				<a href="{{ URL::route('view-spot', $favourite->spot_id) }}" class="favourite">
					{{ $favourite->spot_name }}
				</a> 
				
		</div>
		@endforeach
		

	</head>
