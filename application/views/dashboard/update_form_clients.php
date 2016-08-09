<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid padding-top-five">
<?php if($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error') ?>
	</div>
<?php endif; ?>

<script>

function formValidate ()
{
	var firstname = document.forms["loginForm"]["firstname"].value;
	var lastname = document.forms["loginForm"]["lastname"].value;
	var photoF = document.forms["loginForm"]["photo_front"].value;
	var photoB = document.forms["loginForm"]["photo_back"].value;
	var photoP = document.forms["loginForm"]["photo"].value;

	if(firstname == null || firstname == '' && lastname == null || lastname == '' && photoF == null || photoF == '' && photoB == null || photoB == '' && photoP == null || photoP == '')
	{
		alert('Please Fill All Login Form');
		return false;
	}
	else
	{
		document.getElementById('loginForm').submit();
	}
}

</script>
		<div class="col-md-12">	
		
				<div class="login">
					<?php echo form_open_multipart('clients/complete_data/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update Clients Account</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
					    <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Username</span>
							        <input type="text" name ="username" class="form-control" value="<?php echo $userdata->username; ?>">
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							    	<span class="input-group-addon">E-mail</span>
							        <input type="text" name = "email" class="form-control" value="<?php echo $userdata->email; ?>">
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Telephone</span>
							        <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-9999-9999)' class="form-control" name="telephone" value="<?php echo $userdata->phone; ?>">
							        <!-- <input type="text" name = "telephone" class="form-control"> -->
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Address</span>
							        <div class="col-sm-13">
									<textarea name="address" class="form-control" rows="3" cols="30" style="padding-left:20px;"><?php echo $userdata->address; ?></textarea></div>					      
							    </div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="input-group input-group-lg">
									<div id="map" style="height:400px; margin-top:1em; margin-bottom:1em;"></div>
									<div id="latlong">
									    <input size="20" type="hidden" id="latbox" name="lat" >
									    <input size="20" type="hidden" id="lngbox" name="lng" >
									  </div>
	 								<script>
								      var map;
								      function initMap() {
								      	

								        var myLatlng = new google.maps.LatLng(<?php if($userdata->latitude == NULL || $userdata->longitude == NULL){
								      		echo '-6.152402510005295,106.89429051052855';
								      		}else{
								      			echo $userdata->latitude.','.$userdata->longitude;
								      		}?>);

										var myOptions = {
										     zoom: 15,
										     center: myLatlng,
										     mapTypeId: google.maps.MapTypeId.ROADMAP
										     }
										  map = new google.maps.Map(document.getElementById("map"), myOptions); 

  										var marker = new google.maps.Marker({
										  draggable: true,
										  position: myLatlng, 
										  map: map,
										  title: "Your Restaurant"
										  });

										  google.maps.event.addListener(marker, 'dragend', function (event) {
											    document.getElementById("latbox").value = this.getPosition().lat();
											    document.getElementById("lngbox").value = this.getPosition().lng();
											    update_location();
											});
										 
								      }

								      function update_location(){

								      	lat = document.getElementById("latbox").value;
								      	lng = document.getElementById("lngbox").value;
								      	
										$.ajax({		                
											url: "<?php echo base_url(); ?>" + 'client/update_location/' + encodeURIComponent(lat) + '/' + encodeURIComponent(lng),
											type: 'GET',
											success: function(data) 
											{
									 			//location.reload();
											},
										});

								      }

								       

								      
										
										
									
								    </script>
								    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmTsHuYy6fLCGmHRPZs20KRkEnfLE4anA&callback=initMap"
								    async defer></script>
								</div>
								
							</td>
						</tr>
						 <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Cuisine</span>
							        <input type="text" name ="cuisine" class="form-control" value="<?php echo $userdata->cuisine; ?>">
							    </div>
							</td>
						</tr>
						 <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Open Time</span>
							        <input type="time" name ="opentime" class="form-control" value="<?php echo $userdata->opentime; ?>">
							    </div>
							</td>
						</tr>
						 <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Close Time</span>
							        <input type="time" name ="closetime" class="form-control" value="<?php echo $userdata->closetime; ?>">
							    </div>
							</td>
						</tr>
						 <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <span class="input-group-addon">Open Days</span>
							        <input type="text" name ="opendays" class="form-control" value="<?php echo $userdata->opendays; ?>">
							    </div>
							</td>
						</tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="file" name = "photo" class="form-control" placeholder="Profile Photo" required="required">
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
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="password" name ="old_password" class="form-control" placeholder="Old Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="password" name ="new_password" class="form-control" placeholder="New Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
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

		</div>

</div>