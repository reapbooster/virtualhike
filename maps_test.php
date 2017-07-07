<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 500px;
        width: 50%;
       }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
        var marker_points = [
            ['Angels Landing', 37.2695715,-112.9499035, 12, 'http://www.reapbooster.com/projects/virtualhike/index.php?thisisaverylongpassword&album=hiking'],
            ['name2', 33.971391,-117.6171295, 11, 'http://www.reapbooster.com/projects/virtualhike/index.php?thisisaverylongpassword&album=family'],
            ['name3', 59.939177197629455, 30.273554411974955, 10, 'https://www.google.com']
        ];

      var US = {
        NorthEast: {
            lat: 49.00,
            lng: -66.00
        },
        SouthWest: {
            lat: 24.00,
            lng: -127.00
        }
      }

      function initMap() {
        var myOptions = {
          center: new google.maps.LatLng(37.4419, -122.1419),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var USbounds = new google.maps.LatLngBounds(
          new google.maps.LatLng(US.SouthWest.lat, US.SouthWest.lng),
          new google.maps.LatLng(US.NorthEast.lat, US.NorthEast.lng)
        );

        var map = new google.maps.Map(document.getElementById("map"),myOptions);
        
        map.fitBounds(USbounds);

        setMarkers( map, marker_points );
      }

      function setMarkers(map, locations) {
        var marker_shape = {
            coord: [1, 1, 1, 20, 18, 20, 18 , 1],
            type: 'poly'
        };

        for (var i = 0; i < locations.length; i++){
             var place = locations[i];

             var mk={}; 
             locations.map((place,i)=>{
                 mk['marker'+i] = new google.maps.Marker({
                   position: new google.maps.LatLng(place[1], place[2]),
                   map: map,
                   //iicon: "http://www.reapbooster.com/projects/virtualhike/img/angels_landing-preview.jpg",
                   icon: marker_shape,
                   url: place[4],
                 });
                 return mk['marker'+i];
             }).forEach((marker)=>{
                 google.maps.event.addListener(marker, 'click', function() {
                     window.location.href = marker.url;
                 });    
              }) 

          /*   google.maps.event.addListener(marker, 'click', function() {
               window.location.href = marker.url;
             });*/
        } 
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJsPPKhcBSxRMf7K2XAHGaY1579lYEld8&callback=initMap">
    </script>
  </body>
</html>
