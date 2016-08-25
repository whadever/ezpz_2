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
      function initMap() {

        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat: 37.77, lng: -122.447}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

       

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
       
        directionsService.route({
          origin: {lat: <?php echo $restaurant->latitude ?> , lng: <?php echo $restaurant->longitude ?>},  // Haight.
          destination: {lat: <?php echo $order->latitude ?> , lng: <?php echo $order->longitude ?>},  // Ocean Beach.
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

   
   </script> 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5r3Vc2ohLE1naIZaaYLjfAifThGzAHwc&callback=initMap">
    </script>
