var map;
var lat;
var lng;

//fetch geocoordinates for first search result
var firstResult = $('.result').first()
var initialLat = $(firstResult).find('input[class="lat"]').val();
var initialLng = $(firstResult).find('input[class="lng"]').val();
var center = new google.maps.LatLng(initialLat,initialLng);


//initialise map - center around first search result
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: center,
    disableDefaultUI: true  //disable default UI buttons
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  //place markers from search results on map
  placeMarkers();
}

google.maps.event.addDomListener(window, 'load', initialize);




/*---
click on search result div to center map on location
---*/
$('.result').click(function(){

	var lat = $(this).find('input[class="lat"]').val();
    var lng = $(this).find('input[class="lng"]').val();

    var newCenter = new google.maps.LatLng(lat,lng);
	map.panTo(newCenter); //map.setCenter(newCenter);
})


/*---
Get search values from form - place markers on map
---*/
function placeMarkers(){

  //for each result
  $(".result").each(function(){

  	//get geolocation of spot
    var lat = $(this).find('input[class="lat"]').val();
    var lng = $(this).find('input[class="lng"]').val();

    //get spot info
    var spotTitle = $(this).find('.title').html();
    var spot_url =  $(this).find('.spot-url').val();

    //make info window with link to spot
							var infowindow = new google.maps.InfoWindow({
							      content: '<h2 class="maplink"><a href='+spot_url+'>'+spotTitle+'</a></h2>'
							});		

    var spotLatLng = new google.maps.LatLng(lat,lng);

    //make map marker
	var marker = new google.maps.Marker({
		position: spotLatLng,
		map: map,
		title: spotTitle
	});

	//event listener - marker click - open info window
	google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(map,marker);
		});

  });

};


/*---
search result highlighting
---*/
$('.result').click(function(){

  //remove active class and button from previously active result
  $('.result').removeClass('active-result');
  $('.result').find('.view-spot-btn').css("display", "none");

  //append class to THIS result
  $(this).addClass('active-result');
  $(this).find('.view-spot-btn').css("display", "");
});

/*---
remove view btns - highlight first result
---*/
$('.result').find('.view-spot-btn').css("display", "none");
$(firstResult).addClass('active-result');
$(firstResult).find('.view-spot-btn').css("display", "");
