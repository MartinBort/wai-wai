var lat = $('#lat').val();
var lng = $('#lng').val();
var spot_id = $('#spot_id').val();
var spot_name = $('#spot_name').val();
var spotLatLng = new google.maps.LatLng(lat,lng);

var map;

function initialize() {

	var mapOptions = {
		zoom: 16,
		center: spotLatLng,
		draggable: false,
		scrollwheel: false,
		panControl: false,
		disableDefaultUI: true
	};

	map = new google.maps.Map(document.getElementById('map-canvas'),
	    mapOptions);

	var marker = new google.maps.Marker({
		position: spotLatLng,
		map: map,
	});

	
	}

google.maps.event.addDomListener(window, 'load', initialize);

/*---
FAVOURITES
---*/

//check if favourited
$.ajax({
	type: 'GET',
	dataType: 'json',
	url: 'http://localhost/shimiya/public/favourited',
	//url: 'http://waiwai.space/favourited',
	data: {spot_id: spot_id}, //make associative array with geolocation
	success: function(data){

		if (data) {
				$('#heart').attr('src', '../img/heart-empty.png');				
			} else {
				$('#heart').attr('src', '../img/heart-filled.png');
			}

	}//end success
});//end ajax



//add or remove from favourites
$('#heart').click(function(){
	$.ajax({
	type: 'GET',
	dataType: 'json',
	url: 'http://localhost/shimiya/public/favourites',
	//url: 'http://waiwai.space/favourites',
	data: {spot_id: spot_id, spot_name: spot_name}, //make associative array with geolocation
	success: function(data){

			
			if (data) {
				$('#heart').attr('src', '../img/heart-filled.png');
			} else {
				$('#heart').attr('src', '../img/heart-empty.png');
			}
						
		} //end success
	});//end ajax

}); //end #heart click

