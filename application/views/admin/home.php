<div class="container">

  <div class="row">
    <div class="col-xs-12 text-center">
      <h2 style="margin-bottom:20px;">Welcome to Reyner's God Page</h2>
    </div>
  </div>    
  
  
  <div class="row text-center">
      
    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/drivers/0') ?>">Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></a>
        </div>
      </div>

      <?php foreach($unapproved_drivers as $driver): ?>
        <div class="row">
          <div class="col-xs-6">
            <?php echo $driver->firstname.' '.$driver->lastname ?>
          </div>
          <div class="col-xs-6">
              <span href="" data-toggle="modal" data-target="#approve" data-id="<?php echo $driver->id?>" data-account="driver" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span>
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $driver->id?>" data-account="driver" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/clients/0') ?>">Unapproved Clients <span class="badge"> <?php echo count($unapproved_clients) ?></span></a>
        </div>
      </div>

      <?php foreach($unapproved_clients as $client): ?>
        <div class="row">
          <div class="col-xs-6">
            <?php echo $client->name ?>
          </div>
          <div class="col-xs-6">
              <span href="" data-toggle="modal" data-target="#approve" data-id="<?php echo $client->id?>" data-account="client" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span>
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $client->id?>" data-account="client" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/drivers/0') ?>">Unverified Users <span class="badge"> <?php echo count($unapproved_users) ?></span></a>
        </div>
      </div>
      <?php foreach($unapproved_users as $user): ?>
        <div class="row">
          <div class="col-xs-6">
            <?php echo $user->firstname.' '.$user->lastname ?>
          </div>
          <div class="col-xs-6">
              <span href="" data-toggle="modal" data-target="#approve" data-id="<?php echo $user->id?>" data-account="user" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span>
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $user->id?>" data-account="user" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span></div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>
<!-- Modal delete user -->
<div id="disapprove" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Disapprove Account</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/delete'); ?>
      <p>By doing so, user will be deleted from database. Proceed?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="account">
        <input type="submit" name="delete" value="Confirm" class="btn btn-danger">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal delete user end -->

<script>
$('#disapprove').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');
    var account=$(e.relatedTarget).data('account');

    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="account"]').val(account);

});
</script>