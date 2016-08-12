<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      	<div class="modal-body">

			<div class="row">

				<div class="col-xs-12 text-center">
					
					<h2>Sign In</h2>
				</div>

			</div>

			<div class="row">
				<div class="col-xs-2 col-sm-3"></div>
				<div class="col-xs-8 col-sm-6">
					
					<?php echo form_open('login/sign_in') ?>

						<div class="form-group">
							<label for="">Username:</label>
							<input type="text" autocomplete="off" name="username" class="form-control" required="1">
						</div>

						<div class="form-group">
							<label for="">Password</label>
							<input type="password" autocomplete="off" autosave="off" name="password" class="form-control" required="1">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="login" value="Login">
							<a href="<?php echo base_url('user/register') ?>"><button type="button" class="btn btn-primary" name="signup" >Sign Up</button></a>
						</div>

					</form>
				
				</div>
				<div class="col-xs-2 col-sm-3"></div>
			</div>

    	</div>
    	
    </div>
  </div>
</div>

