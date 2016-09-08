<div class="row" style="margin-bottom: 20px">
	<div class="col-xs-4">
		<h2>Manage Drivers</h2>
	</div>
	<div class="col-xs-8">
    <?php if($this->uri->segment(3) == 0): ?>
		  <a href="<?php echo base_url('admin/approve_all_driver') ?>" class="btn btn-primary pull-right">Approve All</a>
    <?php endif; ?>
	</div>
</div>

<?php if($this->session->flashdata('password')): ?>
  <div class="row">
    <div class="alert alert-success">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
      <?php echo $this->session->flashdata('password'); ?>
    </div>  
  </div>
<?php endif; ?>

<div class="row" style="font-size : 14px">
	<div class="col-xs-12">
		<table id="drivers" class="table table-bordered  table-striped">
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
     
				<?php foreach($drivers as $driver): ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><a href="<?php echo base_url('admin/loginEverywhere/'.$driver->type.'/'.$driver->id) ?>"><?php echo $driver->username; ?></a></td>
						<td><?php echo $driver->email; ?></td>
            <td><?php echo $driver->address ?></td>
						<td><?php echo $driver->telephone; ?></td>
						<td>
            <?php if($this->uri->segment(3) == 1){ ?>
						  <span href="" data-toggle="modal" data-target="#delete_driver" data-id="<?php echo $driver->id?>" class="glyphicon glyphicon-trash pull-right" style="cursor:pointer; font-size: 20px" style="font-size: 12px">      
              </span>
              
							<span href="" class="glyphicon glyphicon-pencil pull-right"  style="cursor:pointer; font-size: 20px; margin-right :3px;" data-toggle="modal" data-target="#edit_driver" data-id="<?php echo $driver->id?>" data-name="<?php echo $driver->username?>" data-email="<?php echo $driver->email?>" data-phone="<?php echo $driver->telephone?>" style="font-size: 12px">                
              </span>
						<?php }else if($this->uri->segment(3) == 0){ ?>
                <a href="<?php echo base_url('admin/approve_driver/'.$driver->id) ?>" class="btn btn-primary" >Approve</a>
            <?php } ?>
						</td>
					</tr>
					<?php $i++ ?>	
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<!-- Modal edit driver -->
<div id="edit_driver" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit driver</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('drivers/edit_driver'); ?>
			<div class="form-group">
				<label for="">driver Name :</label>
				<input type="text" name="name" value="" placeholder="driver Name" class="form-control">
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
</div><!-- Modal edit driver end -->

<!-- Modal delete driver -->
<div id="delete_driver" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete driver</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('drivers/delete'); ?>
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
</div><!-- Modal delete driver end -->

<script>
//triggered when modal is about to be shown
$('#edit_driver').on('show.bs.modal', function(e) {

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
$('#delete_driver').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');


    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);

});
</script>

<script>
	$(document).ready(function() {
   	 $('#drivers').DataTable();
	} );
</script>
