<style>
  h2{
    margin: 15px 0;
  }
  #restaurant_detail>tbody>tr>td, #restaurant_detail>tbody>tr>th, #restaurant_detail>tfoot>tr>td, #restaurant_detail>tfoot>tr>th, #restaurant_detail>thead>tr>td, #restaurant_detail>thead>tr>th {

    border-top: none;
    padding: 8px 0;
  }

</style>
<div class="container" style="margin-top:20px;">
  
  
  <div class="row">
    <div class="col-md-6">
      <h2>Order Detail</h2>
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1 ?>
            <?php foreach($order_detail as $detail): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $detail->name ?></td>
                <td><?php echo $detail->qty ?></td>
                <td><?php echo NZD($detail->price) ?></td>
                <td><?php echo NZD($detail->sub_total) ?></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      <h2>Restaurant Detail</h2>
      <table class="table" id="restaurant_detail">
        <tr>
          <th>Restaurant Name</th>
          <td><?php echo $restaurant->name ?></td>
        </tr>
        <tr>
          <th>Telephone</th>
          <td><a href="tel:<?php echo $restaurant->telephone ?>"><?php echo $restaurant->telephone ?></a></td>
        </tr>
        <tr>
          <th>Restaurant Address</th>
          <td style="max-width: 270px; text-align: justify;"><?php echo $restaurant->address ?></td>
        </tr>
      </table>
      
        <h2>Customer Detail</h2>
        <table class="table" id="restaurant_detail">
          <tr>
            <th>Customer's Name</th>
            <td><?php echo $restaurant->name ?></td>
          </tr>
          <tr>
            <th>Telephone</th>
            <td><a href="tel:<?php echo $restaurant->telephone ?>"><?php echo $restaurant->telephone ?></a></td>
          </tr>
          <tr>
            <th>Customer's Address</th>
            <td style="max-width: 270px; text-align: justify;"><?php echo $restaurant->address ?></td>
          </tr>
        </table>
    </div>
    <div class="col-md-6">
      <div id="map"></div>
          <div id="distance">Distance: </div>
          <div id="duration">Arriving in </div>
        <div id="right-panel" style="width:100%"></div>
    </div>
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
          destination: {lat: <?php echo $restaurant->latitude ?> , lng: <?php echo $restaurant->longitude ?>},
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
            alert(curPos.lat);
            alert(curPos.lng);
            }
        });
     
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5r3Vc2ohLE1naIZaaYLjfAifThGzAHwc&callback=initMap">
    </script>
