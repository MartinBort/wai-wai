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
		<div class="wrapper">
			<a class="form-back-btn" href="{{ URL::route('home') }}"><img src="../public/img/back-btn-white.png"></a>
			<img class="about-img1" src="../public/img/about/about1.jpg">
				<div class="about-dictionary">
						<h1>わい わい</h1>
						<p class="gray-text">
							<i>Adverb</i>
							<img class="about-speaker-icon" src="../public/img/speaker.png" onclick="play()">
						</p>
						<audio id="audio">
							<source src="../public/audio/waiwai.m4a">
							<source src="../public/audio/waiwai.mp3">
							<source src="../public/audio/waiwai.ogg">
						</audio>
						<p>Pronounced <i>"wah-i wah-i"</i></p>
						<h3><span class="gray-text">1. </span> A Japanese onomatopeia for the ambient noise 
						of many people talking at once in a lively or festive manner.</h3>						
				</div>

				<div class="about-text-wrap">
					<h3>Tokyo is a city full of amazing experiences waiting to be sought out. We want you to help
					curate these experiences so they can all be found in one place.</h3>
					<br>
					<h2>Explore and tag</h2>
					<p>Tag all your favourite spots, no matter how niche or obscure. Use multiple tags to 
					make it easier for other users to narrow down the search.</p>
					<br>
					<h2>Search and Discover</h2>
					<p>Search by name, tags or by proximity to your location. Save your favourite spots so 
					you can find them later</p>
				</div>
				
			<div class="btn-wrap">
				<form action="{{ URL::route('home') }}" method="get">
					<button class="btn btn-black">Go back</button>
				</form>	
				<form action="{{ URL::route('account-create') }}" method="get">
					<button class="btn btn-yellow">Sign me up!</button>
				</form>		
			</div>
		</div>
		
		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		<script type="text/javascript">
			function play(){
		       var audio = document.getElementById("audio");
		       audio.play();
		    }
		</script>
	</body>
</html>