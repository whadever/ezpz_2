<div class="container">
	<div class="row">
	  <div class="col-xs-12 text-center">
	    <h2 style="margin-bottom:20px;">Welcome to Reyner's God Page</h2>
	  </div>
  </div>

  <div class="row text-center">
  	<div class="col-xs-4">
        <div class="row">
    		  <a href="<?php echo base_url('admin/drivers/0') ?>">Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></a>
        </div>
        <div class="row">
          <table class="table">
            <?php foreach($unapproved_drivers as $driver): ?>
              <tr>
                <td><?php echo $driver->username; ?></td>
                <td>
                  <span class="glyphicon glyphicon-ok" aria-hidden="true" style="cursor:pointer; font-size: 20px"></span>
                  <span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="modal" data-target="#disapprove" data-account="driver" data-username="<?php echo $driver->username?>" style="cursor:pointer; font-size: 20px;"></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
  	</div>

  	<div class="col-xs-4">
  		  <div class="row">
          <a href="<?php echo base_url('admin/clients/0') ?>">Unapproved Clients <span class="badge"> <?php echo count($unapproved_clients) ?></span></a>
        </div>
        <div class="row">
          <table class="table">
            <?php foreach($unapproved_clients as $client): ?>
              <tr>
                <td><?php echo $client->username; ?></td>
                <td>
                  <span class="glyphicon glyphicon-ok" aria-hidden="true" style="cursor:pointer; font-size: 20px" ></span>
                  <span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="modal" data-target="#disapprove" data-account="client" data-username="<?php echo $client->username?>" style="cursor:pointer; font-size: 20px"></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
  	</div>
  	<div class="col-xs-4">
        <div class="row">
  		    <a href="<?php echo base_url('admin/users/0') ?>">Unverified Users <span class="badge"> <?php echo count($unverified_users) ?></span></a>
        </div>
        <div class="row">
          <table class="table">
            <?php foreach($unverified_users as $user): ?>
              <tr>
                <td><?php echo $user->username; ?></td>
                <td>
                  <span class="glyphicon glyphicon-ok" aria-hidden="true" style="cursor:pointer; font-size: 20px"></span>
                  <span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="modal" data-account="user" data-username="<?php echo $user->username?>" data-target="#disapprove" style="cursor:pointer; font-size: 20px"></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
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
        <h4 class="modal-title">Delete user</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/delete'); ?>
      <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="">
        <input type="hidden" name="account" value="">
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

    var username = $(e.relatedTarget).data('username');
    var acc_type=$(e.relatedTarget).data('account');

    //populate the textbox
    $(e.currentTarget).find('input[name="username"]').val(username);
    $(e.currentTarget).find('input[name="account"]').val(acc_type);

});
</script>
