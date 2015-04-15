/*---
SEARCH NEAR ME 
---*/

$('#nearMeBtn').click(function(){
  
	var lat = $('#lat').val();
	var lng = $('#lng').val();

	$.ajax({
				type: 'GET',
				url: 'http://localhost/shimiya/public/near-me',
				//url: 'http://waiwai.space/near-me',
				data: {lat: lat, lng: lng}, //make associative array with geolocation
				success: function(results){

					//close search panel
					$('#searchPanel').slideUp('fast');

					//remove spot tag icon
					$('#centreMarker').hide();
					//display tag button again
					$('#revealTagIcon').show();

					data = $.parseJSON(results); //turn string to JSON

					//loop through each result
					$.each(data, function(spots,spot) {

						var spot_url = 'http://localhost/shimiya/public/spot-view/'+spot.spot_id
						//var spot_url = 'http://waiwai.space/spot-view/'+spot.spot_id

						//get latitude and longitude of spot
						var spotLatLng = new google.maps.LatLng(spot.latitude,spot.longitude);

						//make info window with link to spot
						var infowindow = new google.maps.InfoWindow({
						      content: '<h2><a href='+spot_url+'>'+spot.spot_name+'</a></h2>'
						});						

						//make map marker
						var marker = new google.maps.Marker({
						      position: spotLatLng,
						      map: map,
						      title: spot.spot_name
							});

						google.maps.event.addListener(marker, 'click', function() {
						    infowindow.open(map,marker);
						  });

					}); 
					
				} //end success
			});//end ajax


  });

//reveal tag icon again
$('#revealTagIcon').click(function(){

	$('#centreMarker').show();
	$('#revealTagIcon').hide();
	
});