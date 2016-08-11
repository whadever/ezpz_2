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
		
		<?php echo form_open('login/register_driver') ?>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" name="username" class="form-control" required="1" >
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

			<div class="form-group">
				<label for="">IRD</label>
				<input type="text" name="ird" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Driver License:</label>
				<input type="text" name="driver_license" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">License Type:</label>
				<select class="form-control" name="license_type">
				            <option value="learner">Learner</option>
				            <option value="restricted">Restricted</option>
				            <option value="full">Full License</option>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>

