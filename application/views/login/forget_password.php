<div class="row">

	<div class="col-md-3 col-xs-1"></div>
	<div class="col-md-6 col-xs-10">

		<?php if(validation_errors()): ?>
            <ul class="alert alert-danger">
                <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        <?php endif; ?>
	</div>

	<div class="col-md-3 col-xs-1"></div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 col-xs-12 col-form">

		
		<?php echo form_open('login/forget/reset') ?>
      		<h1 class="text-center" style="margin-bottom:30px;">Reset Password</h1>
			<div class="form-group">
				<label for="email">Submit your registered e-mail to receive the new password</label>
				<input type="text" name ="email" class="form-control" placeholder="Email" required="1">
			</div>
			<div class="text-center">
				<input type="submit" name="submit" value="Reset Password" id="loginButton" class="btn btn-primary ">
			</div>

		<?php echo form_close(); ?>

	</div>

	<div class="col-md-3"></div>

</div>

        
