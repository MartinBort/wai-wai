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

    //get lat+long
    //document.getElementById("lat").value = pos.lat().toFixed(5);
    //document.getElementById("lng").value = pos.lng().toFixed(5);

    //place marker where you are
    var marker = new google.maps.Marker({
      position: pos,
      map: map,
      title: 'You are here'
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
    position: new google.maps.LatLng(60, 105),
     content: content
   };
      
   var infowindow = new google.maps.InfoWindow(options);
   map.setCenter(options.position);
 }
    
//execute function initialize() once DOM has loaded
google.maps.event.addDomListener(window, 'load', initialize)


//Get search values from form
$("input#check").click(function(){

  var mapTags = [];
  //for each result
  $(".result").each(function(){

      var lati = $(".result").find('input[id="lat"]').val();
      var longi = $(".result").find('input[id="lng"]').val();

      mapTags.push(lati);
      mapTags.push(longi);

  });

  alert(mapTags);

  //cycle through mapTags array - attach each pair to a latlang variable

});


