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
				{{ $favourite->spot_name}}
			
				<a href="{{ URL::route('view-spot', $favourite->spot_id) }}">{{ $spots->spot_name }}</a> 
				<button class="view-spot-btn"><a href="{{ URL::route('edit-spot', $favourite->spot_id) }}">Edit spot</a></button>
				
		</div>
		@endforeach
		

	</head>
