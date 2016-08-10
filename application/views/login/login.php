<div class="row">
	<div class="col-xs-4"></div>
	<div class="col-xs-4 text-center">
		
		<h2>logo</h2>
	</div>
	<div class="col-xs-4"></div>
</div>

<div class="row">
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		
		<?php echo form_open('login/sign_in') ?>

			<div class="form-group">
				<label for="">Username:</label>
				<input type="text" name="username" class="form-control" >
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control" >
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="login" value="Login">
				<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
			</div>

		</form>

	</div>
	<div class="col-xs-4"></div>
</div>

