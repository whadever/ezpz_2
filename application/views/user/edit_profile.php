<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		<?php if(validation_errors()): ?>
            <ul class="alert alert-danger">
                <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        <?php endif; ?>
        <h2>Edit Profile</h2>
	</div>
	<div class="col-xs-3"></div>
</div>

<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		
		<?php echo form_open_multipart('user/edit_profile/'.$this->session->userdata('user_id')) ?>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$" title='Username cannot contain space' class="form-control" value="<?php echo $user->username ?>" required="1" >
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">First Name:</label>
						<input type="text" value="<?php echo $user->firstname ?>" name="firstname" class="form-control" required="1" >
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">Last Name:</label>
						<input type="text" value="<?php echo $user->lastname ?>" name="lastname" class="form-control" required="1" >
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="">Email:</label>
				<input type="text" name="email" value="<?php echo $user->email ?>" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Phone:</label>
				<input type="tel" pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +XXXX-XXXX-XXXX)' name="telephone" value="<?php echo $user->telephone ?>" class="form-control" required="1" >
			</div>

			<div class="form-group">
				<label for="">Address:</label>
				<textarea name="address" class="form-control" required="1" ><?php echo $user->address ?></textarea>
			</div>

			<div class="form-group">
	        	<label for="profile_picture">Profile Picture:</label><br/>
	        	<img src="<?php echo base_url().$user->photo ?>" width="150" id="profile_picture" alt="">
	        	<input type="file" name="photo" class="form-control" >
	        </div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="update" value="Update">
			</div>

		</form>

	</div>
	<div class="col-xs-3"></div>
</div>

