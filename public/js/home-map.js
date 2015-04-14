//declare global variables so accessible from inside functions
var map;
var lat;
var lng;

function initialize() {

  var mapOptions = {
    zoom: 16,
    disableDefaultUI: true  //disable default UI buttons
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(function(position) {

      //get latitude and longitude
      lat = position.coords.latitude.toFixed(5); //configure latlng to 5 decimal precision
      lng = position.coords.longitude.toFixed(5);

      var pos = new google.maps.LatLng(lat,lng);

      //centre map to lat, lng
      map.setCenter(pos);

      /*---
      MARKER ANIMATION + LAT LANG CHANGE ON DRAG
      ---*/
      //on map drag, change centre icon
      google.maps.event.addListener(map, 'drag', function() {
        moveMarker = document.getElementById("centreMarker");
        moveMarker.style.backgroundImage = "url('../public/img/tag-spot-moved.png')"; //http://waiwai.space/img/tag-spot-moved.png
      });

      //change back on drag end
      google.maps.event.addListener(map, 'dragend', function(event) {
        moveMarker = document.getElementById("centreMarker");
        moveMarker.style.backgroundImage = "url('../public/img/tag-spot2.png')"; //http://waiwai.space/img/tag-spot2.png
        //get lat lng from centre of map
        lat = map.getCenter().lat().toFixed(5);
        lng = map.getCenter().lng().toFixed(5);
      });


    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}


/*---
TAG NEW SPOT
---*/
$('#centreMarker').click(function(){

  //Create new form with lat lng, submit it  [http://waiwai.space/tag/current-location]
  $('<form action="http://localhost/shimiya/public/tag/current-location"><input type="hidden" value="'+lat+'" name="lat"><input type="hidden" value="'+lng+'" name="lng"></form>')
    .appendTo('body')
    .submit();
  });


/*---
SEARCH NEAR ME 
---*/
/*
$('').click(function(){

  //close menu panel

  //Create new form with lat lng, submit it
  $('<form action="http://localhost/shimiya/public/near-me"><input type="hidden" value="'+lat+'" name="lat"><input type="hidden" value="'+lng+'" name="lng"></form>')
    .appendTo('body')
    .submit();
  });

});
*/



/*---
ERROR CASE FOR GEOLOCATION
---*/
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(35.7, 139.7),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);

  //display error message
  $('#mapMask').css("z-index", 2);
  $('<p id="locationErrorMessage">Please switch on Location Services in your device settings, and refresh the page</p>').appendTo('#mapMask');

}

google.maps.event.addDomListener(window, 'load', initialize);