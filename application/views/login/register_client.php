<div class="row">
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		<?php if(validation_errors()): ?>
            <ul class="alert alert-danger">
                <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        <?php endif; ?>
	</div>
	<div class="col-xs-4"></div>
</div>

<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		
		<?php echo form_open_multipart('login/register_client') ?>

			<h1>Partner Registration</h1>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' name="username" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Restaurant Name:</label>
				<input type="text" name="name" class="form-control" required="1" >
			</div>
		
			<div class="form-group">
				<label for="">Email:</label>
				<input type="text" name="email" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Phone:</label>
				<input type="tel" pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +XXXX-XXXX-XXXX)' name="telephone" class="form-control" required="1" >
			</div>
			
			<div class="form-group" id="#mapBody">
	     		<label for="">Location</label>
	     		<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
			    <div id="map"></div>
	     	</div>

			<div class="form-group">
				<label for="">Address:</label>
				<textarea id="address_show" disabled="1" class="form-control" required="1" ></textarea>
				<input type="hidden" id="address" name="address">
			</div>

	     	<table class="table">
	     		<thead>
	     			<tr>
	     				<td>&nbsp;</td>
	     				<td>Day</td>
	     				<td>Open Time</td>
	     				<td>Close Time</td>
	     			</tr>
	     		</thead>
	     		<tbody>
	     			<tr class="monday">
	     				<td><input type="checkbox" value="Monday" name="day[]" class="opendays" onclick="enable(this,'monday')"></td>
	     				<td>Monday</td>
	     				<td id="opentime_monday"></td>
	     				<td id="closetime_monday"></td>
	     			</tr>
	     			<tr class="tuesday">
	     				<td><input type="checkbox" value="Tuesday" name="day[]" class="opendays" onclick="enable(this,'tuesday')"></td>
	     				<td>Tuesday</td>

	     				<td id="opentime_tuesday"></td>
	     				<td id="closetime_tuesday"></td>
	     			</tr>
	     			<tr class="wednesday">
	     				<td><input type="checkbox" value="Wednesday" name="day[]" class="opendays" onclick="enable(this,'wednesday')"></td>
	     				<td>Wednesday</td>
	     				<td id="opentime_wednesday"></td>
	     				<td id="closetime_wednesday"></td>
	     				
	     			</tr>
	     			<tr class="thursday">
	     				<td><input type="checkbox" value="Thursday" name="day[]" class="opendays" onclick="enable(this,'thursday')"></td>
	     				<td>Thursday</td>
	     				<td id="opentime_thursday"></td>
	     				<td id="closetime_thursday"></td>
	     				
	     			</tr>
	     			<tr class="friday">
	     				<td><input type="checkbox" value="Friday" name="day[]" class="opendays" onclick="enable(this,'friday')"></td>
	     				<td>Friday</td>
	     				<td id="opentime_friday"></td>
	     				<td id="closetime_friday"></td>
	     			</tr>
	     			<tr class="saturday">
	     				<td><input type="checkbox" value="Saturday" name="day[]" class="opendays" onclick="enable(this,'saturday')"></td>
	     				<td>Saturday</td>
	     				<td id="opentime_saturday"></td>
	     				<td id="closetime_saturday"></td>
	     				
	     			</tr>
	     			<tr class="sunday">
	     				<td><input type="checkbox" value="Sunday" name="day[]" class="opendays" onclick="enable(this,'sunday')"></td>
	     				<td>Sunday</td>
	     				<td id="opentime_sunday"></td>
	     				<td id="closetime_sunday"></td>
	     				
	     			</tr>
	     		</tbody>
	     	</table>

	     	<div class="form-group">
	     	<label for="cuisine">Cuisine</label>
		     	<div class="input-group ">   
		            <select class="form-control" id="multi" multiple="multiple" name="cuisine[]" required="1">
			            <?php foreach ($cuisines as $cuisine): ?>
			            	<option value="<?php echo $cuisine->id ?>"><?php echo $cuisine->name ?></option>
			            <?php endforeach ?>
			        </select>
		        </div>
			</div>

	        <div class="form-group">
	        	<label for="">Photo</label>
	        	<input type="file" name="photo" class="form-control" required="1">
	        </div>
	
			<div class="form-group">
				<input type="hidden" name="lat" id="lat" value="">
				<input type="hidden" name="lng" id="lng" value="">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-3"></div>
	
</div>
<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -43.53520544 , lng: 172.6362254},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var options = {
          
          componentRestrictions: {country: 'nz'}
        };

      
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
       

        var autocomplete = new google.maps.places.Autocomplete(input,options);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
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

	function enable (el,day)
	{
		if($(el).is(":checked")){
			$("#opentime_"+day).append('<input type="time" name="opentime[]" required="1">');
			$("#closetime_"+day).append('<input type="time" name="closetime[]" required="1">');
		}else{
			$("#opentime_"+day).empty();
			$("#closetime_"+day).empty();
		}
			
	}
		
</script>

<script>
	$('#multi').multiSelect();
</script>


