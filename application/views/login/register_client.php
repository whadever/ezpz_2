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
	     			<tr class="monday">
	     				<td><input type="checkbox" value="Monday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Monday</td>
	     				
	     			</tr>
	     			<tr class="tuesday">
	     				<td><input type="checkbox" value="Tuesday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Tuesday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     			<tr class="wednesday">
	     				<td><input type="checkbox" value="Wednesday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Wednesday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     			<tr class="thrusday">
	     				<td><input type="checkbox" value="Thursday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Thursday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     			<tr class="friday">
	     				<td><input type="checkbox" value="Friday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Friday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     			<tr class="saturday">
	     				<td><input type="checkbox" value="Saturday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Saturday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     			<tr class="sunday">
	     				<td><input type="checkbox" value="Sunday" name="days[]" class="opendays" onclick="enable()"></td>
	     				<td>Sunday</td>
	     				<td><input type="time" name="opentime[]"></td>
	     				<td><input type="time" name="closetime[]"></td>
	     			</tr>
	     		</tbody>
	     	</table>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>


<script>
	function enable ()
	{
		$(".monday").append('<td><input type="time" name="opentime[]" disabled="1"></td><td><input type="time" name="closetime[]" disabled="1"></td>');
	}
</script>

