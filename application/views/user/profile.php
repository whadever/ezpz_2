
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

      
</style>

<div class="container" style="margin-top:30px;">
	<div class="row">
			<!--Pill begin-->
			<div class="col-sm-2">
				<div class="row">
					<ul class="nav nav-pills nav-stacked">
					  <li role="presentation" class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
					  <li role="presentation"><a data-toggle="pill" href="#order_history">Order History</a></li>
					  <li role="presentation"><a data-toggle="pill" href="#changePassword">Change Password</a></li>
					</ul>
				</div>
			</div>
			<!--Pill End-->
			<div class="col-sm-10">
				<div class="tab-content profile-content">
					<div id="profile" class="tab-pane fade in active">
						<?php if($this->session->flashdata('success')): ?>
									<div class="alert alert-success alert-dismissible">
										<?php echo $this->session->flashdata('success') ?>
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
						 <?php endif; ?>
						
						<div class="row" id="header">
							
								<h2>Profile</h2>
							
						        
						</div>

						<div class="row">
							
							<div class="col-lg-4">
								
							</div>
							<div class="col-lg-4">
								<div class="profile-picture" style="background-image : url(<?php echo base_url().$user->photo ?>); " id="edit-prof-pic">
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>

						<div class="row text-center" style="margin-top:5%;">
							<div class="col-lg-4">
								<p style="border-bottom: 1px solid #2c3e50; padding-bottom:5px;"><strong>Name</strong></p>
								<p><?php echo $user->username ?></p>
							</div>
							<div class="col-lg-4">
								<p style="border-bottom: 1px solid #2c3e50; padding-bottom:5px;"><strong>Email</strong></p>
								<p><?php echo $user->email ?></p>
							</div>
							<div class="col-lg-4">
								<p style="border-bottom: 1px solid #2c3e50; padding-bottom:5px;"><strong>Telephone</strong></p>
								<p><?php echo $user->telephone ?></p>
							</div>
						</div>
						

						<div class="row" id="#mapBody" style="margin-top:20px;"  >
						
								<div  id="header">
						       		<h2>Address</h2>
						       	</div>
								<div id="map" style="margin-top:20px; margin-bottom:20px"></div>
							
				     		
				     		
						</div>

						<div class="row">
					        <div class="col-sm-12">
							<textarea name="address_show" id="address_show" disabled="disabled" class="form-control" rows="3"><?php echo $user->address; ?></textarea></div>
							<input type="hidden" id="address" name="address" value="<?php echo $user->address; ?>">		     
						</div>

						<div class="row text-center" style="margin-top:5%;">
							<a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/edit_profile/<?php echo $this->session->userdata('user_id') ?>" style="color:white;" class="btn btn-primary">
							<span class="glyphicon glyphicon-edit"></span> Edit Profile</a>
							
						</div>

					</div>

					<div id="order_history" class="tab-pane fade table-responsive toggle-circle-filled">
						
						<table class="table table-condensed" id="orders" data-filter="#filter" data-page-size="10">
							<thead>
								<tr>
									<th data-toggle="true">
										Order Number	
									</th>
									<th>
										Restaurant
									</th>
									<th data-hide="phone">
										Driver Name
									</th>
									<th data-hide="tablet, phone">
										Address
									</th>
									<th data-hide="phone">
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
										
										 <a href="" data-toggle="modal" data-target="#driver_info" data-firstname="<?php echo $history->firstname?>" data-lastname="<?php echo $history->lastname ?>" data-email="<?php echo $history->email?>" data-telephone="<?php echo $history->telephone?>" ><?php echo $history->firstname . ' ' . $history->lastname?></a>
									</td>
									<td>
										<?php echo wordlimiter($history->address,5) ?>
									</td>
									<td>
										<?php echo $history->date ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot class="hide-if-no-paging">
								<td colspan="5">
									<div class="pagination"></div>
								</td>
								
							</tfoot>
						</table>
					</div>

					<div id="changePassword" class="tab-pane fade">
							<div class="row" id="header">
								
									<h2>Change Password</h2>
							        
							</div>

							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-4">
									<?php echo form_open('',array('id' => 'change_password_form')) ?>
							
								    	<div class="form-group">
								            
								            <input type="password" name ="old_password" class="form-control" placeholder="Old Password" required="required">
								        </div>

								    	<div class="form-group">
								            
								            <input type="password" name ="password" id="password" class="form-control" placeholder="New Password" required="required">
								        </div>
								   		<div class="form-group">					          
								            <input type="password" name ="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required="required">
								        </div>
								    	
								    	<button type="button" name="submit" onclick="change_password()" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">Update</button>
								    
									<?php echo form_close() ?>
								</div>
								<div class="col-lg-4"></div>

							</div>
						
					</div>

				</div>
			</div>	

		</div>

			
		
	</div>
</div>

<!-- Modal Driver Info  -->
<div id="driver_info" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>

        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Driver Information</h4>
      </div>
      <div class="modal-body">
          <strong>Driver Name :</strong>
          <p id="name"></p>
          <strong>Driver E-mail :</strong>
          <p id="email"></p>
          <strong>Driver Phone :</strong>
          <p id="phone"></p>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div><!-- Modal Driver Info end -->

<script type="text/javascript">
  function change_password(){


  	if($('#password').val() == $('#confirm_password').val()){

  		var data = $('#change_password_form').serialize();
    
	    $.ajax({
	      url: "<?php echo base_url('user/change_password/'.$this->session->userdata('user_id'))?>",
	      type: 'POST',
	      data: data,
	      cache : false,
	      success: function(result){
	     
	        if(result == 'success'){
	          
	          swal("Password successfully changed!", "","success");
	          setTimeout(function(){ window.location.replace("<?php echo base_url('user/profile/'.$this->session->userdata('user_id')); ?>"); }, 2000);
	          
	        }else if(result == 'failed'){
	          swal('Your old password is invalid',"","error");
	        }
	      }
	    });
  	}else{
  		swal("The Password field does not match the Confirm Password field ", "","warning");
  	}
    
    
  }
</script>


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
   	 $('#orders').footable();
	} );
</script>



<script>
	//triggered when modal is about to be shown
	$('#driver_info').on('show.bs.modal', function(e) {

	    //get data-id attribute of the clicked element
	    var name = $(e.relatedTarget).data('firstname') + ' ' + $(e.relatedTarget).data('lastname');
	    var email = $(e.relatedTarget).data('email');
	    var phone = $(e.relatedTarget).data('telephone');

	    $(e.currentTarget).find('p[id="name"]').empty();
	    $(e.currentTarget).find('p[id="email"]').empty();
	    $(e.currentTarget).find('p[id="phone"]').empty();
	    //populate the textbox
	    $(e.currentTarget).find('p[id="name"]').append(name);
	    $(e.currentTarget).find('p[id="email"]').append(email);
	    $(e.currentTarget).find('p[id="phone"]').append(phone);
	});

</script>

