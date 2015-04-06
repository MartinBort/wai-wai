var lat = $('#lat').val();
var lng = $('#lng').val();

var map;
function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(lat, lng),
    draggable: false,
    scrollwheel: false,
    panControl: false,
    disableDefaultUI: true
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);