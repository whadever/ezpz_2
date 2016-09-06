<div class="row">
	<div class="col-md-4 col-xs-1"></div>
	<div class="col-md-4 col-xs-10">
		<?php if(validation_errors()): ?>
            <ul class="alert alert-danger">
                <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        <?php endif; ?>
	</div>
	<div class="col-md-4 col-xs-1"></div>
</div>

<div class="row">

	<div class="col-md-3"></div>
	<div class="col-md-6 col-xs-12 col-form">

		
		<?php echo form_open_multipart('login/register_driver') ?>
			<h1 class="text-center" style="margin-bottom:30px;">Freelancer Registration</h1>
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' class="form-control" required="1" >
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" name="firstname" class="form-control" required="1" >
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" name="lastname" class="form-control" required="1" >
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="telephone">Phone</label>
		        <div class="input-group">
		          <span class="input-group-addon">+64</span>
		          <input type="tel" name="telephone" class="form-control" required="1" >
		        </div>
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<textarea name="address" class="form-control" required="1" ></textarea>
			</div>

			<div class="form-group">
				<label for="">IRD</label>
				<input type="text" name="ird" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Driver License</label>
				<input type="text" name="driver_license" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">License Type</label>
				<select class="form-control" name="license_type">
				            <option value="Learner">Learner</option>
				            <option value="Restricted">Restricted</option>
				            <option value="Full License">Full License</option>
				</select>
			</div>

			<div class="form-group">
	        	<label for="">Profile Picture</label>
	        	<input type="file" name="photo" class="form-control" required="1">
	        </div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="register" value="Register">
			</div>

		</form>

	</div>

	<div class="col-md-3"></div>

</div>

