<div class="row" style="margin-bottom: 20px">
	<div class="col-xs-4">
		<h2 style="margin-top:0px;">Manage Cuisines</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#add_cuisine">Add Cuisine</button>
	</div>
	<div class="col-xs-8">
    
	</div>
</div>

<div class="row" style="font-size : 14px">
	<div class="col-xs-12">
		<table id="cuisines" class="table table-bordered  table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Cuisine Name</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
				<?php $i = 1; ?>
			<tbody>
     
				<?php foreach($cuisines as $cuisine): ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $cuisine->name ?></td>
						<td><img src="<?php echo base_url().$cuisine->thumb ?>" width="50" alt=""></td>
						<td>
         
						  <span href="" data-toggle="modal" data-target="#delete_cuisine" data-id="<?php echo $cuisine->id?>" class="glyphicon glyphicon-trash pull-right" style="cursor:pointer; font-size: 20px" style="font-size: 12px">      
              </span>
              
							<span href="" class="glyphicon glyphicon-pencil pull-right"  style="cursor:pointer; font-size: 20px; margin-right :3px;" data-toggle="modal" data-target="#edit_cuisine" data-id="<?php echo $cuisine->id?>" data-name="<?php echo $cuisine->name?>"  style="font-size: 12px">                
              </span>
				
						</td>
					</tr>
					<?php $i++ ?>	
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Add cuisine -->
<div id="add_cuisine" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Cuisine</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('admin/add_cuisine'); ?>
      <div class="form-group">
        <label for="">Cuisine Name :</label>
        <input type="text" name="name" placeholder="Cuisine Name" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Photo :</label>
        <input type="file" name="photo" class="form-control">
      </div>
          
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" value="Submit " class="btn btn-primary">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal add cuisine end -->


<!-- Modal edit cuisine -->
<div id="edit_cuisine" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit cuisine</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/edit_cuisine'); ?>
			<div class="form-group">
				<label for="">Cuisine Name :</label>
				<input type="text" name="name" value="" placeholder="cuisine Name" class="form-control">
			</div>
			<label for="">Photo :</label>
        <input type="file" name="photo" class="form-control">
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="update" value="Update" class="btn btn-success">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal edit cuisine end -->

<!-- Modal delete cuisine -->
<div id="delete_cuisine" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete cuisine</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/delete_cuisine'); ?>
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
</div><!-- Modal delete cuisine end -->

<script>
//triggered when modal is about to be shown
$('#edit_cuisine').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var id = $(e.relatedTarget).data('id');
    

    //populate the textbox
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="id"]').val(id);
    
});
</script>
<script>
$('#delete_cuisine').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');


    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);

});
</script>

<script>
	$(document).ready(function() {
   	 $('#cuisines').DataTable();
	} );
</script>
