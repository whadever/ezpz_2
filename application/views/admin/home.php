<div class="container">
  <div class="row">
    <div class="col-xs-12 text-center">
      <h2>Welcome to Reyner's God Page</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <h2 class="text-center">Current Settings</h2>
      <div class="row text-center">
        
        <div class="col-lg-4">
          <p>Background</p>
          <img src="<?php echo base_url().$configuration->background ?>" width="100" alt="">
        </div>

        <div class="col-lg-4">
          <p>Primary Color</p>
          <div class="color" style="height:100px; width:100px; margin:auto; border-radius: 50%; background-color: <?php echo $configuration->primary_color ?>;">
          </div>
        </div>

        <div class="col-lg-4">
          <p>Service Fare</p>
        </div>
      
      </div>

    </div>
    <div class="col-lg-2"></div>
  </div>
  <div class="row text-center" style="margin-top:5%;">
      <a href="<?php echo base_url('admin/edit_settings'); ?>" class="btn btn-primary">
      <span class="glyphicon glyphicon-edit"></span> Edit Profile</a>            
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

