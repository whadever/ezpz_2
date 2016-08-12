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
				<input type="text" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' name="username" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Restaurant Name:</label>
				<input type="text" name="name" class="form-control" required="1" >
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
	     				<td><input type="checkbox" value="Monday" name="day[]" class="opendays" onclick="enable(this,'monday')"></td>
	     				<td>Monday</td>
	     				<td id="opentime_monday"></td>
	     				<td id="closetime_monday"></td>
	     			</tr>
	     			<tr class="tuesday">
	     				<td><input type="checkbox" value="Tuesday" name="day[]" class="opendays" onclick="enable(this,'tuesday')"></td>
	     				<td>Tuesday</td>

	     				<td id="opentime_tuesday"></td>
	     				<td id="closetime_tuesday"></td>
	     			</tr>
	     			<tr class="wednesday">
	     				<td><input type="checkbox" value="Wednesday" name="day[]" class="opendays" onclick="enable(this,'wednesday')"></td>
	     				<td>Wednesday</td>
	     				<td id="opentime_wednesday"></td>
	     				<td id="closetime_wednesday"></td>
	     				
	     			</tr>
	     			<tr class="thursday">
	     				<td><input type="checkbox" value="Thursday" name="day[]" class="opendays" onclick="enable(this,'thursday')"></td>
	     				<td>Thursday</td>
	     				<td id="opentime_thursday"></td>
	     				<td id="closetime_thursday"></td>
	     				
	     			</tr>
	     			<tr class="friday">
	     				<td><input type="checkbox" value="Friday" name="day[]" class="opendays" onclick="enable(this,'friday')"></td>
	     				<td>Friday</td>
	     				<td id="opentime_friday"></td>
	     				<td id="closetime_friday"></td>
	     			</tr>
	     			<tr class="saturday">
	     				<td><input type="checkbox" value="Saturday" name="day[]" class="opendays" onclick="enable(this,'saturday')"></td>
	     				<td>Saturday</td>
	     				<td id="opentime_saturday"></td>
	     				<td id="closetime_saturday"></td>
	     				
	     			</tr>
	     			<tr class="sunday">
	     				<td><input type="checkbox" value="Sunday" name="day[]" class="opendays" onclick="enable(this,'sunday')"></td>
	     				<td>Sunday</td>
	     				<td id="opentime_sunday"></td>
	     				<td id="closetime_sunday"></td>
	     				
	     			</tr>
	     		</tbody>
	     	</table>

	     	<div class="form-group">
		     	<div class="input-group ">
		            <label for="cuisine">Cuisine</label>
		            <select class="form-control" id="multi" multiple="multiple" name="cuisine[]" required="1"><?php print_r($restaurants) ?>
			            <?php foreach ($cuisines as $cuisine): ?>
			            	<option value="<?php echo $cuisine->id ?>"><?php echo $cuisine->name ?></option>
			            <?php endforeach ?>
			        </select>
		        </div>
			</div>

	        <div class="form-group">
	        	<label for="">Photo</label>
	        	<input type="file" name="photo" class="form-control" required="1">
	        </div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>


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

