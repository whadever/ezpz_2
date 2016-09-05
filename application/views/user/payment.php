<style>
      #map {
        height: 400px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }
      h2{
      	margin-top: 0;
      	margin-bottom: 10px;
      }
    </style>

<?php echo form_open(''); ?>

<div class="container" id="cart-info" style="padding-bottom:20px; padding-top:20px;">

	<div class="row">
		<div class="col-md-6">
		  <h2>Payment Detail</h2>
			  <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table ">

		        <tr>    
		                
		                <th>No.</th>
		                <th>Item Name</th>
		                <th>Qty</th>
		                <th style="text-align:right">Item Price</th>
		                <th style="text-align:right">Sub-Total</th>
		        </tr>

		        <?php $i = 1; ?>

		        <?php foreach ($order_details as $item): ?>

		                

		                <tr>
		                        
		                        <td><?php echo $i ?></td>
		                        <td><?php echo $item->name; ?> </td>
		                        <td><?php echo $item->qty; ?></td>
		                        <td style="text-align:right"><?php echo NZD($item->price); ?></td>
		                        <td style="text-align:right"><?php echo NZD($item->sub_total); ?></td>
		                        
		                </tr>

		        <?php $i++; ?>
		        <?php endforeach; ?>
		        </table>
				
				<table class="table">
		        <tr>
		                <td colspan="3"> </td>
		                <td class="right"><strong>Sub Total(GST included)</strong></td>
		                <td class="text-right"><?php echo NZD($order->total_price); ?></td>
		        </tr>

		        <tr>
		                <td colspan="3"> </td>
		                <td class="right"><strong>Delivery Cost</strong></td>
		                <td class="text-right" id="cost_show">$ </td>
		        </tr>

		        <tr>
		                <td colspan="3"> </td>
		                <td class="right"><strong>Total</strong></td>
		                <td class="text-right" id="total">$ </td>
		        </tr>

	        </table>

	        <label for="">Detail</label>
          <div id="fare">Fare: $ 2.00 / Km</div>
	        <div id="distance_show">Distance: </div>
 			    <div id="duration_show">Arriving in: </div>
          <input type="hidden" name="distance" id="distance" value="">
          <input type="hidden" name="duration" id="duration" value="">
 			<br>

	        <label for="">Deliver To:</label>
            <p id="address_show"><?php echo $order->address ?></p>
            <input type="hidden" id="address" name="address">

			    <input type="hidden" name="lat" id="lat" value="">
	        <input type="hidden" name="lng" id="lng" value="">
	        <input type="hidden" name="cost" id="cost" value="">
          <input type="hidden" name="payment" id="payment" value="">  

          
		</div>

		<div class="col-md-6">
			<h2>Location</h2>
            <div id="map"></div>
		</div>

	</div>
        
       <!--  <?php if($this->session->flashdata('success')): ?>
                
                <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success') ?>
                </div>
        

        <?php elseif($this->session->flashdata('failed')): ?>

                <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('failed') ?>
                </div>

        <?php endif; ?> -->

   <div class="row" style="margin: 20px 0">
      
        <button type="submit" name="submit" onclick="pay()" class="btn btn-primary btn-float">Pay Now</button>
      
  </div>
</div>

<script type="text/javascript">
  function pay(){
    $.ajax({
      url: "<?php echo base_url('order/find_driver/'.$order->code)?>",
      type: 'POST',
      cache : false,
      success: function(result){
        if(result == 'success'){
          swal("Payment Success!", "success");
          window.location.replace("<?php echo base_url('order/find_driver/'.$order->code); ?>");
        }
      }
    })
  }
</script>

  
<?php echo form_close() ?> 

 <script>
      function initMap() {

        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat: 37.77, lng: -122.447}
        });
        directionsDisplay.setMap(map);
        

       

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
       
        directionsService.route({
          origin: {lat: <?php echo $restaurant->latitude ?>, lng: <?php echo $restaurant->longitude ?>},  // Haight.
          destination: {lat: <?php echo $order->latitude ?> , lng: <?php echo $order->longitude ?>},  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status == 'OK') {
            /* get distance and print it */
            distance = response.routes[0].legs[0].distance.value / 1000;
             document.getElementById('distance_show').innerHTML += 
            distance.toFixed(1) + " Km";
            $('#distance').val(distance.toFixed(1));

            //get total cost

            cost = distance * <?php echo 2 ?>;
             if(cost < 5){
              cost = 5;
            }
            document.getElementById('cost_show').innerHTML += 
            cost.toFixed(2);

            total = cost + <?php echo $order->total_price ?>;         
            document.getElementById('total').innerHTML += 
            total.toFixed(2);
           
            $('#cost').val(cost.toFixed(2));
            $('#payment').val(total.toFixed(2));


            /*get duration */
            duration = response.routes[0].legs[0].duration.value / 60;
       
            if(duration < 60){
              document.getElementById('duration_show').innerHTML += 
              duration.toFixed(0) + " Minutes";
            }else{
              hour = Math.floor(duration / 60);
              min = duration % 60;

              document.getElementById('duration_show').innerHTML += 
              hour + " Hour(s) " + min + " Minutes" ;
            }

            $('#duration').val(duration.toFixed(0));


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
