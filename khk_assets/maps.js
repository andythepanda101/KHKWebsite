// this script adds in a map of KHK location to the bottom section of the site
(function($) {
  var position = new google.maps.LatLng(44.982150, -93.239600);
  var myOptions = {
    zoom: 14,
    center: position,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(
      document.getElementById("map_canvas"),
      myOptions);
  var marker = new google.maps.Marker({
      position: position,
      map: map,
      title:"KHK Beta"
  });
  var contentstring = "<font color='black'>KHK Beta</font>";
  var infowindow = new google.maps.InfoWindow({
      content: contentstring
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
})(jQuery)
