
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

      .nav-pills>li>a{
      	border-radius: 0px;
      	color: #95a5a6;
      }
      .nav-pills>li>a:hover{
      	color: #34495e;
      	background-color: transparent;
      }
      .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
	    color:#34495e;
	    background-color:transparent;
	    border-right: 4px solid #34495e;
    	}
      .tab-content{
      	padding-left: 5%;
      	padding-right: 5%;
      	padding-top: 0px;
      	border:0px;
      	
      }

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
			
			<div class="col-sm-2" style="padding-right:0px;">
				<div class="row">
					<ul class="nav nav-pills nav-stacked">
					  <li role="presentation" class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
					  <li role="presentation"><a data-toggle="pill" href="#order_history">Order History</a></li>
					</ul>
				</div>
			</div>

			<div class="col-sm-10">
				<div class="tab-content">
					<div id="profile" class="tab-pane fade in active" >
							<?php if(validation_errors()): ?>
						            <ul class="alert alert-danger">
						                <?php echo validation_errors('<li>','</li>'); ?>
						            </ul>
						     <?php endif; ?>
						<div class="row" id="header">
								
						        <h2>Edit Profile</h2>
						</div>

						<div class="row">
								
								<?php echo form_open_multipart('user/edit_profile/'.$this->session->userdata('user_id')) ?>

									<div class="form-group">
										<label for="">Username:</label>
										<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' class="form-control" value="<?php echo $user->username ?>" required="1" >
									</div>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="">First Name:</label>
												<input type="text" value="<?php echo $user->firstname ?>" name="firstname" class="form-control" required="1" >
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="">Last Name:</label>
												<input type="text" value="<?php echo $user->lastname ?>" name="lastname" class="form-control" required="1" >
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="">Email:</label>
										<input type="text" name="email" value="<?php echo $user->email ?>" class="form-control" required="1" >
									</div>

									<div class="form-group">
										<label for="">Phone:</label>
										<input type="tel" pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +XXXX-XXXX-XXXX)' name="telephone" value="<?php echo $user->telephone ?>" class="form-control" required="1" >
									</div>

									<div class="form-group" id="#mapBody">
							     		<label for="">Location</label>
							     		<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
									    <div id="map"></div>
							     	</div>

							     	<div class="form-group">
								        <label for="address">Address</label>
								        <div class="col-sm-13">
										<textarea name="address_show" id="address_show" disabled="disabled" class="form-control" rows="3"><?php echo $user->address; ?></textarea></div>
										<input type="hidden" id="address" name="address" value="<?php echo $user->address; ?>">					      
								    </div>

									<div class="form-group">
							        	<label for="profile_picture">Profile Picture:</label><br/>
							        	<img src="<?php echo base_url().$user->photo ?>" width="150" id="profile_picture" alt="">
							        	<input type="file" name="photo" class="form-control" >
							        </div>

									<div class="form-group">
									<input type="hidden" name="lat" id="lat" value="<?php echo $user->latitude; ?>">
									<input type="hidden" name="lng" id="lng" value="<?php echo $user->longitude; ?>">
									<input type="submit" class="btn btn-primary" name="update" value="Update">
									</div>

								<?php echo form_close(); ?>

						</div>

						
					</div>

					<div id="order_history" class="tab-pane fade">
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
										Driver Name
									</th>
									<th>
										Address
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
										<a href="<?php echo base_url('user/order_detail/'.$history->code) ?>">
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
									<td>
										<?php echo $history->date ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>	

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
//triggered when modal is about to be shown
$('#order_details').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var code = $(e.relatedTarget).data('code');
     
     //populate the textbox
     $(e.currentTarget).find('input[name="code"]').val(code);

     test = code.replace(/,/g,'');
});
</script>

