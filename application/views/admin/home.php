<div class="container">
	<div class="row">
	  <div class="col-xs-12 text-center">
	    <h2>Welcome to Reyner's God Page</h2>
	  </div>
  </div>

  <div class="row">
  	<div class="col-xs-4">
  		<a href="<?php echo base_url('admin/drivers/0') ?>">Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></a>
  	</div>
  	<div class="col-xs-4">
  		<a href="<?php echo base_url('admin/clients/0') ?>">Unapproved Clients <span class="badge"> <?php echo count($unapproved_clients) ?></span></a>
  	</div>
  	<div class="col-xs-4">
  		<a href="#">Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></a>
  	</div>
  </div>
</div>

