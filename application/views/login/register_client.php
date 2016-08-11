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

			<div class="input-group input-group-lg">
	            <label for="opendays">Open Days</label>
	            <select class="form-control" id="multiDays" multiple="multiple" name="opendays[]">
		            <option value="Monday">Monday</option>
		            <option value="Tuesday">Tuesday</option>
		            <option value="Wednesday">Wednesday</option>
		            <option value="Thursday">Thursday</option>
		            <option value="Friday">Friday</option>
		            <option value="Saturday">Saturday</option>
		            <option value="Sunday">Sunday</option>
		        </select>
	        </div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>

