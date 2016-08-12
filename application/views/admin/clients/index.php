<div class="row" style="margin-bottom: 20px">
	<div class="col-xs-4">
		<h2>Manage clients</h2>
	</div>
	<div class="col-xs-8">
		
	</div>
</div>

<div class="row" style="font-size : 14px">
	<div class="col-xs-12">
		<table id="clients" class="table table-bordered  table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Email</th>
          <th>Address</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
				<?php $i = 1; ?>
			<tbody>
     
				<?php foreach($clients as $client): ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><a href="<?php echo base_url('admin/loginEverywhere/'.$client->type.'/'.$client->id) ?>"><?php echo $client->name; ?></a></td>
						<td><?php echo $client->email; ?></td>
            <td><?php echo $client->address ?></td>
						<td><?php echo $client->telephone; ?></td>
						<td>
            
						  <span href="" data-toggle="modal" data-target="#delete_client" data-id="<?php echo $client->id?>" class="glyphicon glyphicon-trash pull-right" style="cursor:pointer; font-size: 20px" style="font-size: 12px">      
              </span>
              
							<span href="" class="glyphicon glyphicon-pencil pull-right"  style="cursor:pointer; font-size: 20px; margin-right :3px;" data-toggle="modal" data-target="#edit_client" data-id="<?php echo $client->id?>" data-name="<?php echo $client->name?>" data-email="<?php echo $client->email?>" data-phone="<?php echo $client->telephone?>" style="font-size: 12px">                
              </span>
							

						</td>
					</tr>
					<?php $i++ ?>	
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<!-- Modal edit client -->
<div id="edit_client" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit client</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('clients/edit_client'); ?>
			<div class="form-group">
				<label for="">client Name :</label>
				<input type="text" name="name" value="" placeholder="client Name" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Email :</label>
				<input type="text" name="email" placeholder="Email" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Phone :</label>
				<input type="text" name="phone" placeholder="Phone" class="form-control">
			</div>     
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="update" value="Update" class="btn btn-success">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
    
  </div>
</div><!-- Modal edit client end -->

<!-- Modal delete client -->
<div id="delete_client" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete client</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('clients/delete'); ?>
			<p>Are you sure?</p>
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="delete" value="Confirm" class="btn btn-danger">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal delete client end -->

<script>
//triggered when modal is about to be shown
$('#edit_client').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var id = $(e.relatedTarget).data('id');
    var email = $(e.relatedTarget).data('email');
    var phone = $(e.relatedTarget).data('phone');

    //populate the textbox
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="email"]').val(email);
    $(e.currentTarget).find('input[name="phone"]').val(phone);
});
</script>
<script>
$('#delete_client').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');


    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);

});
</script>

<script>
	$(document).ready(function() {
   	 $('#clients').DataTable();
	} );
</script>
