var map;

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
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);


      //create spot marker to DOM
      var image = 'img/tag-spot2.png'; //custom marker image 
      var marker = new google.maps.Marker({
          position: pos,
          title:"Tag a new spot!",
          icon: image
      });

      
      marker.setMap(map); // To add the marker to the map
      map.setCenter(pos);


      //click event - creating new spot
      google.maps.event.addListener(marker, 'click', function() {
        
        //navigate to
        window.location.href = 'http://localhost/shimiya/public/tag/current-location';

      });


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
    position: new google.maps.LatLng(35.7, 139.7),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);