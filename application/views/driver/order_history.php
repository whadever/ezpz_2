
<style>

      #header{
	    padding: 10px 5px;
	    margin-bottom: 10px;
	}

      .tab-content h2{
      	margin-top: 0px;
      }
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>

			<div class="col-lg-10" style="padding:3% 0;">
			
			

	
				<div class="row" id="header">
						
				        <h2>Order History</h2>
				</div>	

				<table class="table table-bordered" id="orders">
					<thead>
						<tr>
							<th>
								Order Number	
							</th>
							<th>
								Restaurant
							</th>
							<th>
								Client Name
							</th>
							<th>
								Address
							</th>
							<th>
								Earnings
							</th>
							<th>
								Date
							</th>
						</tr>	
					</thead>	
					<tbody>
						<?php foreach($order_history as $history) : ?>
						
						<tr>
							<td>
								<a href="<?php echo base_url('driver/order_detail/'.$history->code) ?>">
									<?php echo $history->code ?>
								</a>
							</td>
							<td>
								<?php echo $history->name ?>
							</td>
							<td>
								
								 <?php echo $history->firstname . ' ' . $history->lastname?>
							</td>
							<td>
								<?php echo $history->address ?>
							</td>
							<td style="color: #42C537">
								<?php echo NZD($history->driver_earnings) ?>
							</td>
							<td>
								<?php echo $history->date ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

	
		<div class="col-lg-1">
			
		</div>
	</div>
</div>


<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $user->latitude ?> , lng: <?php echo $user->longitude ?>},
          zoom: 20
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var options = {
          
          componentRestrictions: {country: 'nz'}
        };

        var myLatLng = new google.maps.LatLng(<?php echo $user->latitude.','.$user->longitude; ?>);
      
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
       

        var autocomplete = new google.maps.places.Autocomplete(input,options);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Place not found");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          $('#lat').val(place.geometry.location.lat());
          $('#lng').val(place.geometry.location.lng());
          $('#address').val(place.formatted_address);
          $('#address_show').val(place.formatted_address);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5r3Vc2ohLE1naIZaaYLjfAifThGzAHwc&libraries=places&callback=initMap"
    async defer></script>


<script>

var test = [""];
<?php $i = 0; ?>

<?php foreach ($lists as $list): ?>
	test[<?php echo $i ?>] = "<?php echo $list->name ?>";
	<?php $i++; ?>
<?php endforeach; ?>

$("#restaurant-search").typeahead({

                        minLength: 0,
                        items: 4,
                        source: test,   
                    });

</script>

<!-- Prevent users submit form by hitting "Enter" -->

<script type="text/javascript"> 

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

<script>
	$(document).ready(function() {
   	 $('#orders').DataTable();
	} );
</script>

<script>

