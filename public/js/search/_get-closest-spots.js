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
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    //get lat+long
    var latitude  = pos.lat().toFixed(5);
    var longitude = pos.lng().toFixed(5);
    document.getElementById("lat").value = latitude;
    document.getElementById("lng").value = longitude;

    //get spots nearest to user (pass user's position)
    //getSpots(latitude, longitude); 


    //errors in geolocation
    }, function() {
          handleNoGeolocation(true);
    });

  } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
  }
}; //end initialize function

  function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
      var content = 'Error: The Geolocation service failed.';
    } else {
      var content = 'Error: Your browser doesn\'t support geolocation.';
    }

      
    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(options.position);
  } //end handleNoGeolocation
    
  //execute function initialize() once DOM has loaded
  google.maps.event.addDomListener(window, 'load', initialize)


  function getSpots(lat, lng) {

    //alert("lat "+lat+", lang "+lng);

    //send current location, retrieve closest spots
    $.ajax({
        type: 'GET',
        url: 'http://localhost/shimiya/public/location/ajax', //set get action
        data: { latitude: lat, longitude: lng },              //pass through lat+lng
        dataType: "json",
        success: function(data){

          //cycle through each spot in returned data
          $.each(data, function(key, spot) {

            //create marker for each spot
            var spotLatLng = new google.maps.LatLng(spot.latitude,spot.longitude);
            var marker = new google.maps.Marker({
              position: spotLatLng,
              map: map,
              title: spot.spot_name,
              url: "http://localhost/shimiya/public/spot-view/"+spot.spot_id

            })
                //add event listener for marker, onclick go to URL
                google.maps.event.addListener(marker, 'click', function() {
                    window.location.href = this.url;
                });
          });//end foreach

        }//end callback
    });//end ajax

  }