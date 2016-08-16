<div class="row">
	<div class="col-xs-3">
		
	</div>
	<div class="col-xs-6">
		<?php if(validation_errors()): ?>
			<ul class="alert alert-danger">
				<?php echo validation_errors('<li>','</li>'); ?>
			</ul>
		<?php endif; ?>
		<h2>Edit Profile</h2>
	</div>
	<div class="col-xs-3">
		
	</div>
</div>


<div class="row">
	
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		
		<?php echo form_open_multipart('driver/edit_profile/'.$this->session->userdata('user_id')) ?>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' class="form-control" value="<?php echo $user->username ?>" required="1">
			</div>
			
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">Firstname:</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo $user->firstname ?>" required="1">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">Lastname:</label>
						<input type="text" name="lastname" class="form-control" value="<?php echo $user->lastname ?>" required="1">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="">Email:</label>
				<input type="text" name="email" class="form-control" value="<?php echo $user->email ?>" required="1">
			</div>

			<div class="form-group">
				<label for="">Phone:</label>
				<input type="tel" pattern="[\+]\d{4}\d{4}\d{4}" name="telephone" class="form-control" value="<?php echo $user->telephone?>" required="1">
			</div>

			<div class="form-group">
				<label for="">Address:</label>
				<textarea name="address" class="form-control" required="1"><?php echo $user->address ?></textarea>
			</div>

			<div class="form-group">
				<label for="">IRD Number:</label>
				<input type="text" class="form-control" name="ird" required="1" value="<?php echo $user->ird ?>">
			</div>

			<div class="form-group">
				<label for="">Driver License:</label>
				<input type="text" name="driver_license" class="form-control" required="1" value="<?php echo $user->driver_license ?>" >
			</div>
			
			<div class="form-group">
				<label for="">License Type</label>
				<select class="form-control" name="license_type">
					<option value="Learner" <?php if($user->license_type == 'Learner') echo 'selected' ?> >Learner</option>
					<option value="Restricted" <?php if($user->license_type == 'Restricted') echo 'selected' ?> >Restricted</option>
					<option value="Full License" <?php if($user->license_type == 'Full License') echo 'selected' ?> >Full License</option>
				</select>
			</div>

			<div class="form-group">
				<label for="profile_picture">Profile Picture:</label><br>
				<img src="<?php echo base_url().$user->photo ?>" width="150" id="profile_picture" alt="">
				<input type="file" class="form-control" name="photo">
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update" name="update">
			</div>

		</form>

	</div>
	<div class="col-xs-3"></div>

</div>