<div class="container-fluid">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<?php echo $user->username ?>
		<div class="profile-picture" style="background-image : url(<?php echo base_url().$user->photo ?>); width: 500px; height:500px;"></div>
	</div>
	<div class="col-md-2"></div>
</div>