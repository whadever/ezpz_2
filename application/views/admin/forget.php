<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->flashdata('failed')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('failed') ?>
	</div>
<?php endif; ?>


<?php if($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error') ?>
	</div>
<?php endif; ?>

		
		<div class="login">
			<?php echo form_open('admin/forget/reset', array ("id" => "loginForm")) ?>
			<table align="center">
				<tr>
			    	<td>
			        	<div class="heading">
			            	<h3>Forget Password</h3>
			            </div>
			        </td>
			    </tr>
				<tr>
			    <td>
			    	<div class="input-group input-group-lg">
			            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			            <input type="text" name ="email" class="form-control" placeholder="Email">
			        </div>
			    </td>
			    </tr>
			    <tr>
			    	<td><input type="submit" name="submit" value="Reset Password" onClick="submitForm ()" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;"></td>
				</tr>
			</table>
			</form>
		</div>


	</div>

</div>