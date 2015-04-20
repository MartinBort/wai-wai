function initialize() {

	var lat 	= document.getElementById('lat').value;
	var lng 	= document.getElementById('lng').value;

	var myLatlng = new google.maps.LatLng(lat, lng);

	var mapOptions = {
		zoom: 15,
		center: myLatlng,
		draggable: false,
	    scrollwheel: false,
	    panControl: false,
	    disableDefaultUI: true
		}

		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var marker = new google.maps.Marker({
					    position: myLatlng,
					    map: map,
					    title: 'Hello World!'
						});
}

google.maps.event.addDomListener(window, 'load', initialize);