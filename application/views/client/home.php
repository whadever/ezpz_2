<div class="row" style="padding-top:10px;">

		<?php if($this->session->flashdata('success')) : ?>
			<div class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $this->session->flashdata('success') ?>
			</div>

		<?php endif; ?>	

		<!--The content tabs-->
		<div class="col-sm-12" style="margin-top:20px;">
			<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#info">Restaurant Detail</a></li>
			    <!-- <li><a data-toggle="tab" href="#menu">Update Menu</a></li> -->
			    <li><a data-toggle="tab" href="#pass">Change Password</a></li>
		  	</ul>
		  	<!--Restaurant Detail Tab-->
		  	<div class="tab-content" style="margin-bottom:30px;">
				<div id="info" class="login tab-pane fade in active" style="margin-top:0px;">
					<?php echo form_open_multipart('client/edit_profile/'.$this->session->userdata('user_id')) ?>
					<div class="row">
						<div class="col-xs-12">
				        	<div class="heading">
				            	<h3>Update Restaurant Info</h3>
				            </div>
			            </div>
					</div><!--End of tab header row-->   
					<hr>   
					<div class="row">
						<div class="col-md-6 col-xs-12" style="padding-right:25px;">
								<div class="form-group">
							        <label for="name">Restaurant Name</label>
							        <input type="text" name ="name" class="form-control" value="<?php echo $restaurant->name; ?>">
							    </div>
							    <div class="form-group">
							    	<label fr="email">E-mail</label>
							        <input type="text" name = "email" class="form-control" value="<?php echo $restaurant->email; ?>">
							    </div>
						
							    <div class="form-group">
							        <label for="tel">Telephone</label>
							        <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-9999-9999)' class="form-control" name="telephone" value="<?php echo $restaurant->telephone; ?>">
							        <!-- <input type="text" name = "telephone" class="form-control"> -->
							    </div>				
							    <div class="form-group">
							     	<label for="cuisine">Cuisine</label>
							     	<div class="input-group ">   
							            <select class="form-control" id="multi" multiple="multiple" name="cuisine[]" required="1">
							            <?php $exploded_id = explode(', ', $restaurant->cuisine_id); ?>
							            <?php $i = 0; ?>
								            <?php foreach ($cuisines as $cuisine): ?>
												<?php
													
														if($exploded_id[$i] == $cuisine->id){
															$selected = "selected";
															$i++;
															
														}else{
															$selected = '';
															
														}
														
												 ?>
								            	<option value="<?php echo $cuisine->id ?>" <?php echo $selected ?> ><?php echo $cuisine->name ?></option>
								            	
								            <?php endforeach ?>
								        </select>
							        </div>
								</div>
								<div class="wrap">
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
								
									<?php $j = 0; ?>
						     		<?php for ($i=0; $i < count($days) ; $i++):  ?>
										
											<?php if($restaurant_time[$j]['day'] == $days[$i]){

													$checked = 'checked';
													$open = '<input type="time" name="opentime[]" value="'.$restaurant_time[$j]['opentime'].'" required="1">';
													$close = '<input type="time" name="closetime[]" value="'.$restaurant_time[$j]['closetime'].'" required="1">';
													if($j < count($restaurant_time)-1){
														
														$j++;
														
													}
													
												}else if($restaurant_time[$j]['day'] != $days[$i]){
													$checked = '';
													$open = '';
													$close = '';
													} ?>
										
						     			<tr class="<?php echo $days[$i] ?>">
						     				<td><input type="checkbox" value="<?php echo $days[$i] ?>" name="day[]" class="opendays" <?php echo $checked ?> onclick="enable(this,'<?php echo $days[$i] ?>')"></td>
						     				<td><?php echo $days[$i] ?></td>
						     				<td id="opentime_<?php echo $days[$i] ?>"><?php echo $open ?></td>
						     				<td id="closetime_<?php echo $days[$i] ?>"><?php echo $close ?></td>
						     			</tr>
						     			
						     		<?php endfor; ?> 			
						     		</tbody>
						     	</table> 
						    	</div>
					    	<div class="form-group">
					            <label for="photo">Photo</label>
					            <input type="file" name = "photo" class="form-control" placeholder="Profile Photo">
					        </div>
					    	<input type="hidden" name="lat" id="lat" value="<?php echo $restaurant->latitude; ?>">
							<input type="hidden" name="lng" id="lng" value="<?php echo $restaurant->longitude; ?>">
							<input type="hidden" name="username" id="username" value="<?php echo $restaurant->username; ?>">
					    	
					    	</td>
					    </div>
					    <div class="col-md-6 col-xs-12">
							<div class="form-group" id="#mapBody">
					     		<label for="">Location</label>
					     		<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
							    <div id="map"></div>
					     	</div>

					     	<div class="form-group">
						        <label for="address">Address</label>
						        <div class="col-sm-12">
								<textarea name="address_show" id="address_show" disabled="disabled" class="form-control" rows="3"><?php echo $restaurant->address; ?></textarea></div>
								<input type="hidden" id="address" name="address" value="<?php echo $restaurant->address; ?>">					      
						    </div>
						</div>
						
						
					</div>

					<div class="row">
						<div class="col-xs-12">
							<input type="submit" name="update" value="Update" class="btn btn-primary ">
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
				<!--End of Restaurant info update-->
				<!--Menu Tab-->
				<div id="menu" class="tab-pane fade">
					<div class="row">
						<div class="col-xs-12"><?php echo form_open() ?>
							<div class="heading">
								<h2>Menu List</h2>
							</div>
							<hr>
							<div class="panel panel-default">							  
							  <div class="panel-body">
							  		<div class="wrap">
							    	<table class="table table-striped">
							    		<thead>
							    			<tr>
							    				<th>No.</th>
							    				<th>Photo</th>
							    				<th>Name</th>
							    				<th class="hidden-xs">Description</th>
							    				<th>Price</th>
							    				<th>Action</th>
							    			</tr>
							    		</thead>
							    		<tbody>
							    			<?php $i = 1 ?>
							    			<?php foreach($dishes as $dish): ?>
							    			<tr>
							    				<td><?php echo $i ?></td>
							    				<td><img src="<?php echo base_url($dish->photo) ?>" width="50" alt=""></td>
							    				<td><?php echo $dish->name ?></td>
							    				<td class="hidden-xs" style="max-width: 200px"><div style="word-wrap: break-word; width: 80%"><?php echo $dish->description ?></div></td>
							    				<td><?php echo NZD($dish->price) ?></td>
							    				<td>
							    				<span class="glyphicon glyphicon-pencil" aria-hidden="true" href="" data-toggle="modal" data-target="#edit_menu" data-id="<?php echo $dish->id?>" data-price="<?php echo $dish->price ?>" data-name="<?php echo $dish->name?>" data-description="<?php echo $dish->description ?>" style="cursor:pointer;""></span>

							    				<span class="glyphicon glyphicon-trash" href="" aria-hidden="true" data-toggle="modal" data-target="#delete_menu" data-id="<?php echo $dish->id ?>" style="cursor:pointer;" ></span>
							    				</td>
							    			</tr>
							    			<?php $i++; ?>
							    			<?php endforeach; ?>
							    		</tbody>
							    	</table>
							    	</div>
							  </div>
							</div>
						</div>
						<?php echo form_close() ?>
						<div class="col-xs-5">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_menu">Add menu</button>
						</div>
					</div>
					<!--Menu Table end-->

					<!-- Modal -->
					<div class="modal fade" id="add_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content login">
					      <div class="modal-header heading">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add Menu</h4>
					      </div>
					      <?php echo form_open_multipart('client/add_menu') ?>
					      <div class="modal-body">
					        	<div class="form-group">
					        		<label for="name">Name</label>
					        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="price">Price</label>
					        		<input type="text" class="form-control" name="price" value="" placeholder="Dish's Price" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="photo">Photo</label>
					        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="description">Description</label>
					        		<textarea class="form-control" name="description" value="" placeholder="Dish's Description" rows="3" ></textarea>
					        	</div>
					      </div>
					      <div class="modal-footer">
					        <input type="submit" value="Save changes" name="submit" class="btn btn-primary">
					        <!-- <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Close"> -->
					      </div>
					      <?php echo form_close() ?>
					    </div>
					  </div>
					</div><!--Menu Add Modal End-->
					<!-- Modal Edit Menu-->
					<div class="modal fade" id="edit_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content login">
					      <div class="modal-header heading">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Edit Dish Detail</h4>
					      </div>
					      <?php echo form_open_multipart('client/edit_menu/') ?>
					      <div class="modal-body">
					      		<input type="hidden" name="id" value="">
					        	<div class="form-group">
					        		<label for="name">Name</label>
					        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="price">Price</label>
					        		<input type="text" class="form-control" name="price" id="price" value="" placeholder="Dish's Price" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="photo">Photo</label>
					        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo">
					        	</div>
					        	<div class="form-group">
					        		<label for="description">Description</label>
					        		<textarea class="form-control" name="description" value="" placeholder="Dish's Description" rows="3" ></textarea>
					        	</div>
					      </div>
					      <div class="modal-footer">
					        <input type="submit" value="Save changes" name="update" class="btn btn-primary">
					        <!-- <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Close"> -->
					      </div>
					      <?php echo form_close() ?>
					    </div>
					  </div>
					</div><!--Edit menu modal-->

					<!-- Modal delete menu -->
					<div id="delete_menu" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Delete Menu</h4>
					      </div>
					      <div class="modal-body">
					        <?php echo form_open('client/delete_menu'); ?>
								<p>Are you sure?</p>
					      </div>
					      <div class="modal-footer">
					      	<input type="hidden" name="id" value="">
					        <input type="submit" name="delete" value="Confirm" class="btn btn-danger">
					        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
					        <?php echo form_close() ?>
					      </div>
					    </div>
					  </div>
					</div><!-- Modal delete user end -->
				</div><!--End of menu tab-->

				<!--Update Password-->
				<div id="pass" class="login tab-pane fade">
					<?php echo form_open('dashboard/change_password/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Change Password</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="form-group">
					            
					            <input type="password" name ="old_password" class="form-control" placeholder="Old Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="form-group">
					            
					            <input type="password" name ="new_password" class="form-control" placeholder="New Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="form-group">					          
					            <input type="password" name ="conf_password" class="form-control" placeholder="Confirm Password" required="required">
					        </div>
					    </td>
					    </tr>
					   	<tr>
					    	<td>
					    	<input type="submit" name="submit" value="Update" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">
					    	</td>
						</tr>
					</table>
					</form>
				</div>
			</div><!--End of tab content-->
		</div>
</div>
</div>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $restaurant->latitude ?> , lng: <?php echo $restaurant->longitude ?>},
          zoom: 20
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var options = {
          
          componentRestrictions: {country: 'nz'}
        };
        var myLatLng = new google.maps.LatLng(<?php echo $restaurant->latitude.','.$restaurant->longitude; ?>);
      
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
//triggered when modal is about to be shown
$('#edit_menu').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('name');
    var price = $(e.relatedTarget).data('price');
    var description = $(e.relatedTarget).data('description');

    //populate the textbox
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="price"]').val(price);
    $(e.currentTarget).find('textarea[name="description"]').val(description);
});
$('#delete_menu').on('show.bs.modal', function(e) {
	//get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);

})
</script>