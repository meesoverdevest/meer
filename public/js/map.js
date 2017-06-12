$(document).on("click", "#location-submit", function(e) {
    var street = $("#location-input").val();
    var city = "dordrecht";
    var location = street + ", " + city;

    if(location != "") {
      geocodeLocation(location);
    }
});

var map;
var markers = [];
var styles = [
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      { "visibility": "on" },
      { "weight": 2.5 },
      { "color": "#24b0e2" }
    ]
  },{
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.locality",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  }
];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: {
        lat: 51.787609,
        lng: 4.693391
      },
      mapTypeId: 'terrain',
      disableDefaultUI: true,
      styles: styles
    });

    // Place a polygon around the area
    map.data.loadGeoJson('./js/dordrecht_boundaries.json');
    map.data.setStyle(function (feature) {
	    var color = feature.getProperty('fillColor');
	    var strokeColor = feature.getProperty('strokeColor');
  		return {
  			  fillColor: color,
  		    strokeWeight: 1,
  		    strokeColor: strokeColor
  		};
	});
}

function centerMap(latLng) {
    map.panTo(latLng);
    map.setZoom(14);
}

function draw(lat, lon, i) {
	markers[i] = new google.maps.Marker({
        position: { lat: lat, lng: lon },
        map: map,
        title: 'Peilbuis'
	});
}

function geocodeLocation(location) {
	$.ajax({
		url: "http://maps.googleapis.com/maps/api/geocode/json?address=" + location,
		method: "GET",
		success: function(data) {
			console.log(data);

			if(data.results.length == 0) {
				alert("No results");
				return;
			}

			centerMap(data.results[0].geometry.location);
		}
	}); 
}