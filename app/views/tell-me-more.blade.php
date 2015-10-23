<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<!-- normalize.css for resetting css across all browsers -->
		{{ HTML::style('css/normalize.min.css') }}
		<!-- custom css -->
		{{ HTML::style('css/home.css') }}
		{{ HTML::style('css/gui.css') }}
		<!-- favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
	</head>
	<body>
		<a href="{{ URL::route('home') }}"><img src="../public/img/back-btn-black.png"></a>
		<div id="form-logo"><img src="../public/img/banner/logo.png"></div>

			<img src="../public/img/about/about1.png" class="header-img">
			<div class="text-wrap">
				<p>The word Wai-Wai is a Japanese onomatopeia for the ambient noise 
				of many people talking at once in a lively or festive manner. Be it at
				a park, bar or just out and about.</p>
				<p>waiwai.space is a way to discover and share places of interest within
				Tokyo.</p>
				<p>Tokyo is an amazing city to get lost in, you'll come across a vast
				landscape of quirks and amusements.</p>
				<p>Use waiwai.space as way to tag areas undiscovered to wanderers or for
				you yourself to explore the depths of the city</p>

			</div>
			
		<div class="btn-wrap">
				<a href="{{ URL::route('account-create') }}">
					<button class="btn yellow-btn">Sign me up!</button>
				</a>
			</div>
		

		


		{{ HTML::script('js/jquery-1.11.1.min.js') }}
	</body>
</html>