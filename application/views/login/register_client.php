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
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		
		<?php echo form_open_multipart('login/register_client') ?>

			<h1>Partner Registration</h1>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" name="username" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Restaurant Name:</label>
				<input type="text" name="name" class="form-control" required="1" >
			</div>
			
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Email:</label>
				<input type="text" name="email" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Phone:</label>
				<input type="tel" pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +XXXX-XXXX-XXXX)' name="telephone" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Address:</label>
				<textarea name="address" class="form-control" required="1" ></textarea>
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
	     			<tr>
	     				<td><input type="checkbox" value="Monday" class="opendays"></td>
	     				<td>Monday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Tuesday" class="opendays"></td>
	     				<td>Tuesday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Wednesday" class="opendays"></td>
	     				<td>Wednesday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Thursday" class="opendays"></td>
	     				<td>Thursday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Friday" class="opendays"></td>
	     				<td>Friday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Saturday" class="opendays"></td>
	     				<td>Saturday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     			<tr>
	     				<td><input type="checkbox" value="Sunday" class="opendays"></td>
	     				<td>Sunday</td>
	     				<td><input type="time"></td>
	     				<td><input type="time"></td>
	     			</tr>
	     		</tbody>
	     	</table>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

			<button onclick="showValue()">Alert</button>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>

<script>
	function showValue(){
		var checkedValue = null; 
		var inputElements = document.getElementsByClassName('opendays');
		for(var i=0; inputElements[i]; ++i){
		      if(inputElements[i].checked){
		           checkedValue = inputElements[i].value;
		           break;
		      }
		}
		alert(checkedValue);
	}

</script>

