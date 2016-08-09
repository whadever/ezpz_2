<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid padding-top-five">
<?php if($this->session->flashdata('success')): ?>
  	<div class="alert alert-success">
  		<?php echo $this->session->flashdata('success'); ?>
  	</div>
<?php endif; ?>

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
	var photo = document.forms["loginForm"]["photo"].value;

	if(firstname == null || firstname == '' && lastname == null || lastname == '' && photo == null || photo == '')
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

		<div class="col-md-6"></div>

		<div class="col-md-6">	
		
				<div class="login">
					<?php echo form_open_multipart('user/complete_data/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update User Account</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
					    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-user"></i></span>
						            <input type="text" name ="username" class="form-control" placeholder="Username" value="<?php echo $userdata->username; ?>">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						            <input type="text" name = "email" class="form-control" placeholder="Email" value="<?php echo $userdata->email; ?>">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
						            <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-999-9999)' class="form-control" name="telephone" placeholder="Telephone" value="<?php echo $userdata->telephone; ?>">
						            <!-- <input type="text" name = "telephone" class="form-control" placeholder="Telephone"> -->
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-home"></i></span>
						            <div class="col-sm-13">
									<textarea name="address" class="form-control" placeholder="Address" rows="3" cols="35"><?php echo $userdata->address; ?></textarea>
									</div>	
						        </div>
						    </td>
						    </tr>
							<tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-user"></i></span>
						            <input type="text" name ="firstname" class="form-control" placeholder="First Name" required="required" value="<?php echo $userdata->firstname; ?>">
						        </div>
						    </td>
						    </tr>
							<tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						            <input type="text" name = "lastname" class="form-control" placeholder="Last Name" required="required" value="<?php echo $userdata->lastname; ?>">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						            <input type="file" name = "photo" class="form-control" placeholder="Photo" value="<?php echo $userdata->photo; ?>">
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
</div></div>