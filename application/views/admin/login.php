<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->flashdata('failed')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('failed') ?>
	</div>
<?php endif; ?>




<script>

function formValidate ()
{
	var username = document.forms["loginForm"]["username"].value;
	var password = document.forms["loginForm"]["password"].value;

	if(username == null || username == '' && password == null || password == '')
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
<div class="container-fluid" style="padding-top:5%;">
		<?php if($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error') ?>
			</div>
		<?php endif; ?>
		<div class="col-md-4">	</div>

		<div class="col-md-4">

				<div class="login">
					<?php echo form_open('admin/login', array ("id" => "loginForm", 'name' => 'loginForm', 'onSubmit' => 'formValidate(); return false')) ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Admin Login</h3>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="text" name ="username" class="form-control" id="username" placeholder="Username" required>
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="password" name = "password" id="password" class="form-control" placeholder="Password" required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    	<td><input type="submit" name="submit" value="Login" onClick="submitForm ()" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;"></td>
						</tr>
					</table>
					</form>
					
				</div>

		</div>

		<div class="col-md-4">	</div>
</div>



		