 <div class="row">
 	<div class="col-md-8">
 	
 		<div id="map"></div>
 		<div id="distance">Distance: </div>
 		<div id="duration">Arriving in </div>
 	</div>

 	<div class="col-md-4" ><div id="right-panel"></div></div>
 </div>
 <div class="row">
 	<div class="col-xs-12">
 		
 	</div>
 </div>
    <script>

          //Initialize the map
          function initMap() {

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: {lat: 37.77, lng: -122.447}
          });

          var directionsDisplay = new google.maps.DirectionsRenderer;
          var directionsService = new google.maps.DirectionsService;

          directionsDisplay.setMap(map);
          directionsDisplay.setPanel(document.getElementById('right-panel'));

          

          if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
              };

              calculateAndDisplayRoute(directionsService, directionsDisplay, pos);

              
            })
          }

          // var onChangeHandler = function() {
          //   calculateAndDisplayRoute(directionsService, directionsDisplay, pos);
          // };

          // calculateAndDisplayRoute(directionsService, directionsDisplay);
          // document.getElementById('mode').addEventListener('change', function() {
          //   calculateAndDisplayRoute(directionsService, directionsDisplay);
          // });
        }

        //Get The Direction After Get Current Location
        function calculateAndDisplayRoute(directionsService, directionsDisplay, curPos) {

        directionsService.route({
          // origin: {lat: <?php echo $restaurant->latitude ?>, lng: <?php echo $restaurant->longitude ?>},  // Haight.
          // destination: {lat: <?php echo $order->latitude ?> , lng: <?php echo $order->longitude ?>},  // Ocean Beach.
          origin: {lat: curPos.lat, lng: curPos.lng},
          destination: {lat: -6.201708 , lng: 106.781601},
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status == 'OK') {
            /* get distance and print it */
            distance = response.routes[0].legs[0].distance.value / 1000;
             document.getElementById('distance').innerHTML += 
            distance.toFixed(1) + " Km";          

            
            /*get duration */
            duration = response.routes[0].legs[0].duration.value / 60;
            document.getElementById('duration').innerHTML += 
            duration.toFixed(0) + " Minutes";

            directionsDisplay.setDirections(response);

           
          } else {
            window.alert('Directions request failed due to ' + status);
            }
        });
     
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5r3Vc2ohLE1naIZaaYLjfAifThGzAHwc&callback=initMap">
    </script>
