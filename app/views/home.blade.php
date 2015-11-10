<!DOCTYPE html>
<html>
<head>
	<title>Wai Wai</title>
	<!-- Prevent iphone browsers from zooming -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	{{ HTML::style('css/build/style.css') }}
	</head>
	<body>
		@if(Session::has('global'))
		<p id="global"> {{ Session::get('global') }} </p>
		@endif

		<div class="wrapper home-parallax">

			<div class="home-hero home-parallax__layer home-parallax__layer--back">
				<div class="home-banner">
					<img class="logo" src="img/banner/logo.png">
				
						<a class="login-btn" href="{{ URL::route('account-sign-in') }}">Login</a>
				
				</div>
					<img class="hero-img" src="img/banner/home-banner.jpg">
				<h1 class="home-title">waiwai.space</h1>
			</div>
			<div class="home-parallax__layer home-parallax__layer--base">

				<div class="home-blurb">
					<h2>A treasure map for Tokyo</h2>
					<h3>
						waiwai is a way to share and discover locations of interest
						all over the city of Tokyo.
					</h3>
					<p>
						Use the app to tag and share your favourite rockabilly barbers or outdoor skate spot.
						Search tags to find a secluded date spot or a nearby manga cafe with wifi.
						Whatever your niche in the city, search it out.
					</p>
				</div>
				

				<div class="btn-wrap">
					<form action="{{ URL::route('tell-me-more') }}" method="get">
						<button class="btn btn-black">
							Tell me more
						</button>
					</form>
					<form action="{{ URL::route('account-create') }}" method="get">
						<button class="btn btn-yellow">
							Sign me up!
						</button>
					</form>
				</div>
				
			</div>
			
		</div>

		


		{{ HTML::script('js/jquery-1.11.1.min.js') }}
	</body>
	</html>