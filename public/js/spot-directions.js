function initialize() {

	var lat 	= document.getElementById('lat').value;
	var lang 	= document.getElementById('lang').value;

	var myLatlng = new google.maps.LatLng(lat, lang);

	var mapOptions = {
		zoom: 15,
		center: myLatlng
		}

		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var marker = new google.maps.Marker({
					    position: myLatlng,
					    map: map,
					    title: 'Hello World!'
						});
}

google.maps.event.addDomListener(window, 'load', initialize);