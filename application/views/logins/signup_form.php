<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid padding-top-five">
<?php if($this->session->flashdata('error')): ?>
  	<div class="alert alert-danger">
	<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>		
<div class="col-md-1">	</div>
<div class="col-md-10 col-xs-12">	
	<div class="col-md-6 col-xs-12">			
	</div>
	<div class="col-md-6 col-xs-12">	
					<div class="login">
						<?php echo form_open('accounts/signup_submit', array('name'=>'signup_user_form', 'id'=>'signUpUserForm', 'onSubmit' => 'form_validation(); return false;') ) ?>
						<table align="center">
							<tr>
						    	<td>
						        	<div class="heading">
						            	<h3 style="margin-bottom:0px;">Register User Account</h3>
						            	<hr>
						            </div>
						        </td>
						    </tr>
							<tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-user"></i></span>
						            <input type="text" name ="username" class="form-control" placeholder="Username">
						        </div>
						    </td>
						    </tr>
							<tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						            <input type="password" name = "password" class="form-control" placeholder="Password">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						            <input type="text" name = "email" class="form-control" placeholder="Email">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
						            <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-999-9999)' class="form-control" name="telephone" placeholder="Telephone">
						            <!-- <input type="text" name = "telephone" class="form-control" placeholder="Telephone"> -->
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-home"></i></span>
						            <div class="col-sm-13">
									<textarea name="address" class="form-control" placeholder="Address" rows="3" cols="35"></textarea>
									</div>	
						        </div>
						    </td>
						    </tr>
						   	<tr>
						    	<td>
						    	<input type="submit" name="submit" value="Sign Up" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">
						    	</td>
							</tr>
						</table>
						</form>
					</div>

	</div>

</div>

<div class="col-md-1">	</div>
</div>

<script type="text/javascript">

	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}

	function form_validation(){

		var username = document.forms["signup_user_form"]["username"].value;
		var password = document.forms["signup_user_form"]["password"].value;
		var email = document.forms["signup_user_form"]["email"].value;
		var telephone = document.forms["signup_user_form"]["telephone"].value;
		var address = document.forms["signup_user_form"]["address"].value;
		if(username == null || username == ""){
			alert("Username must be filled");
			return false;
		}
		else if(password == null || password == ""){
			alert("Password must be filled");
			return false;
		}
		else if(!validateEmail(email)){
			alert("Invalid email address");
			return false;
		}
		else if(telephone == null || telephone == ""){
			alert("Telephone must be filled");
			return false;
		}
		else if(address == null || address == ""){
			alert("Address must be filled");
			return false;
		}
		else{
			document.getElementById('signUpUserForm').submit();
		}

	}

</script>
