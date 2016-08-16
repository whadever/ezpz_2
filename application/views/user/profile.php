<div class="container-fluid" style="padding-top:20px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<div class="row">
				<div class="profile-picture" style="background-image : url(<?php echo base_url().$user->photo ?>); " id="edit-prof-pic">
				</div>
			</div>
			<div class="row">
				<p id="profile-name"><?php echo $user->username ?></p>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>