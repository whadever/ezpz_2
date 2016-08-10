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
		
		<?php echo form_open('user/submit') ?>

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
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>

