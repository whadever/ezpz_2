<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container padding-top-five">
<?php if($this->session->flashdata('error')): ?>
  	<div class="alert alert-danger">
  		<?php echo $this->session->flashdata('error'); ?>
  	</div>
<?php endif; ?>		
	<div class="col-md-1"></div>

	<div class="col-md-10 col-xs-12">
		<div class="login">
			<?php echo form_open('accounts/signup_submit/driver', array('name'=>'signup_driver_form', 'id'=>'signUpDriverForm', 'onSubmit' => 'form_validation(); return false;')) ?>
			<table align="center">
				<tr>
					<td>
					    <div class="heading">
					     <h3>Register as Freelancer</h3>
					     <hr>
					     </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">Username</span>
					        <input type="text" name ="username" class="form-control">
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">Password</span>
					        <input type="password" name = "password" class="form-control">
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					    	<span class="input-group-addon">E-mail</span>
					        <input type="text" name = "email" class="form-control">
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">Telephone</span>
					        <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-9999-9999)' class="form-control" name="telephone">
					        <!-- <input type="text" name = "telephone" class="form-control"> -->
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">Address</span>
					        <div class="col-sm-13">
							<textarea name="address" class="form-control" rows="3" cols="30" style="padding-left:20px;"></textarea></div>					      
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">IRD Number</span>
					        <input type="text" name = "ird_number" class="form-control">
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">Driver License</span>
					        <input type="text" name = "driver_license" class="form-control">
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="input-group input-group-lg">
					        <span class="input-group-addon">License Type</span>
					        <select class="form-control" name="license_type">
					            <option value="learner">Learner</option>
					            <option value="restricted">Restricted</option>
					            <option value="full">Full License</option>
					        </select>
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="submit" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;" value="Sign Up">
					</td>
				</tr>
			</table>
			</form>
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

		var username = document.forms["signup_driver_form"]["username"].value;
		var password = document.forms["signup_driver_form"]["password"].value;
		var email = document.forms["signup_driver_form"]["email"].value;
		var telephone = document.forms["signup_driver_form"]["telephone"].value;
		var address = document.forms["signup_driver_form"]["address"].value;
		var ird_number = document.forms["signup_driver_form"]["ird_number"].value;
		var driver_license = document.forms["signup_driver_form"]["driver_license"].value;
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
		else if(ird_number == null || ird_number == ""){
			alert("IRD Number must be filled");
			return false;
		}
		else if(driver_license == null || driver_license == ""){
			alert("Driver License must be filled");
			return false;
		}
		else{
			document.getElementById('signUpDriverForm').submit();
		}

	}

</script>