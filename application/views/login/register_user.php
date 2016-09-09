<div class="row">

	<div class="col-md-3 col-xs-1"></div>
	<div class="col-md-6 col-xs-10">

		<?php if(validation_errors()): ?>
            <ul class="alert alert-danger">
                <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        <?php endif; ?>
	</div>

	<div class="col-md-3 col-xs-1"></div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 col-xs-12 col-form">

		
		<?php echo form_open_multipart('login/register_user',array('name' => 'register_user','class' => 'cmxform', 'id' => 'registerUser','onsubmit' => "return form_validation()")) ?>
      <h1 class="text-center" style="margin-bottom:30px;">User Registration</h1>
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" name="username" id="username" onkeyup="check_username()" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' class="form-control" required="1" >
        <span id="username_error_message"></span>
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" name="firstname" class="form-control" required="1" >
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" name="lastname" class="form-control" required="1" >
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" id="email" class="form-control" required="1" >
        <span id="email_error_message"></span>
			</div>

			<div class="form-group">
				<label for="">Phone</label>
        <div class="input-group">
          <span class="input-group-addon">+64</span>
          <input type="tel" name="telephone" class="form-control" required="1" >
        </div>
				
			</div>
			
			<div class="form-group" id="#mapBody">
	     		<label for="">Location</label>
	     		<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
			    <div id="map"></div>
	     	</div>

			<div class="form-group">
				<label for="">Address</label>
        <textarea id="address_show" disabled="1" class="form-control" required="1" ></textarea>
        <input type="hidden" id="address" name="address" required="1">
			</div>

			<div class="form-group">
	        	<label for="">Profile Picture</label>
	        	<input type="file" name="photo" class="form-control">
	        </div>

			<div class="form-group">
				<input type="hidden" name="lat" id="lat" value="">
				<input type="hidden" name="lng" id="lng" value="">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>

	<div class="col-md-3"></div>

</div>

<script>


    function check_username(){
      var username = $("#username").val();

      if(username != ''){
      
      $.ajax({
        url: "<?php echo base_url('login/check_username')?>",
        data: {username:username},
        type: 'POST',
        cache : false,
        success: function(result){
         
          if(result == 'taken'){
            $('#username_error_message').empty();
            $('#username_error_message').append("Username has been taken");
            error_username = true;
          }else if(result == 'available'){
            $('#username_error_message').empty();
            $('#username_error_message').append('Username Available');
          }
         
          
        }
      
      });
    }else{
      $('#username_error_message').empty();
    }


    }

    function check_email(){
      var email = $("#email").val();

      $.ajax({
        url: "<?php echo base_url('login/check_user')?>",
        data: {email:email},
        type: 'POST',
        cache : false,
        success: function(result){
          if(result == 'taken'){
            $('#email_error_message').append("Email has been taken");
            $('#email_error_message').show();
            error_email = true;
          }else if(result == 'available'){
            $('#email_error_message').append('');
          }
         
          
        }
      
      });


    }

</script>



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
  function form_validation(){

    var address = document.forms["register_user"]["address_show"].value;

    if(address == null || address == ""){
      alert("Address must be filled");
      return false;
    }


  }
</script>
