<!DOCTYPE html>
<html>
	<head>
		<title>Wai-Wai</title>
		
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</head>
	<body>

		<p>Getting location, plase wait...</p>

		<p>your current latitude: </p><div id="lat"></div>
		<p>your current longitude: </p><div id="lng"></div>
		<div id="map-canvas" style="height:200px;width:500px;"></div>


		<script>
		var map;

		function initialize() {

		  // Try HTML5 geolocation
		  if(navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = new google.maps.LatLng(position.coords.latitude,   //pass variable pos
		                                       position.coords.longitude);

		      var mapOptions = {
			    zoom: 16,
			    center: pos
			  };

			  //create a new map in <div> #map-canvas, pass variable mapOptions
			  map = new google.maps.Map(document.getElementById('map-canvas'),
			      mapOptions);


		      //map.setCenter(pos);
		      //get lat+long
		  		document.getElementById("lat").innerHTML = pos.lat().toFixed(5);
          		document.getElementById("lng").innerHTML = pos.lng().toFixed(5);

		    }, function() {
		      handleNoGeolocation(true);
		      
		    });
		  } else {
		    // Browser doesn't support Geolocation
		    handleNoGeolocation(false);
		  }
		}

		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
		    var content = 'Error: The Geolocation service failed.';
		  } else {
		    var content = 'Error: Your browser doesn\'t support geolocation.';
		  }

		  
		  var options = {
		    map: map,
		    position: new google.maps.LatLng(60, 105),
		    content: content
		  };
		  
		  var infowindow = new google.maps.InfoWindow(options);
		  map.setCenter(options.position);
		}
		
		//execute function initialize() once DOM has loaded
		google.maps.event.addDomListener(window, 'load', initialize)

</script>

		
	</body>
</html>