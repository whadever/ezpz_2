<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php echo form_open() ?>
				<div class="heading" style="padding-top:3%;">
					<h2 style="display:inline;">Menu List</h2>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_menu">Add menu</button>
				</div>
				<hr>

				<div class="panel panel-default">							  
				  	<div class="panel-body">
					  	<div class="wrap">
					    	<table class="table table-striped">
					    		<thead>
					    			<tr>
					    				<th>No.</th>
					    				<th>Photo</th>
					    				<th>Name</th>
					    				<th class="hidden-xs">Description</th>
					    				<th>Price</th>
					    				<th>Action</th>
					    			</tr>
					    		</thead>
					    		<tbody>
					    			<?php $i = 1 ?>
					    			<?php foreach($dishes as $dish): ?>
					    			<tr>
					    				<td><?php echo $i ?></td>
					    				<td><img src="<?php echo base_url($dish->photo) ?>" width="50" alt=""></td>
					    				<td><?php echo $dish->name ?></td>
					    				<td class="hidden-xs" style="max-width: 200px"><div style="word-wrap: break-word; width: 80%"><?php echo $dish->description ?></div></td>
					    				<td><?php echo NZD($dish->price) ?></td>
					    				<td>
					    				<span class="glyphicon glyphicon-pencil" aria-hidden="true" href="" data-toggle="modal" data-target="#edit_menu" data-id="<?php echo $dish->id?>" data-price="<?php echo $dish->price ?>" data-name="<?php echo $dish->name?>" data-description="<?php echo $dish->description ?>" style="cursor:pointer;""></span>

					    				<span class="glyphicon glyphicon-trash" href="" aria-hidden="true" data-toggle="modal" data-target="#delete_menu" data-id="<?php echo $dish->id ?>" style="cursor:pointer;" ></span>
					    				</td>
					    			</tr>
					    			<?php $i++; ?>
					    			<?php endforeach; ?>
					    		</tbody>
						    </table>
					    </div>
			  		</div>
				</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content login">
      <div class="modal-header heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Menu</h4>
      </div>
      <?php echo form_open_multipart('client/add_menu') ?>
      <div class="modal-body">
        	<div class="form-group">
        		<label for="name">Name</label>
        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
        	</div>
        	<div class="form-group">
        		<label for="price">Price</label>
        		<input type="text" class="form-control" name="price" value="" placeholder="Dish's Price" required="1">
        	</div>
        	<div class="form-group">
        		<label for="photo">Photo</label>
        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo" required="1">
        	</div>
        	<div class="form-group">
        		<label for="description">Description</label>
        		<textarea class="form-control" name="description" value="" placeholder="Dish's Description" rows="3" ></textarea>
        	</div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Save changes" name="submit" class="btn btn-primary">
        <!-- <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Close"> -->
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div><!--Menu Add Modal End-->

<!-- Modal Edit Menu-->
<div class="modal fade" id="edit_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content login">
      <div class="modal-header heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Dish Detail</h4>
      </div>
      <?php echo form_open_multipart('client/edit_menu/') ?>
      <div class="modal-body">
      		<input type="hidden" name="id" value="">
        	<div class="form-group">
        		<label for="name">Name</label>
        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
        	</div>
        	<div class="form-group">
        		<label for="price">Price</label>
        		<input type="text" class="form-control" name="price" id="price" value="" placeholder="Dish's Price" required="1">
        	</div>
        	<div class="form-group">
        		<label for="photo">Photo</label>
        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo">
        	</div>
        	<div class="form-group">
        		<label for="description">Description</label>
        		<textarea class="form-control" name="description" value="" placeholder="Dish's Description" rows="3" ></textarea>
        	</div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Save changes" name="update" class="btn btn-primary">
        <!-- <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Close"> -->
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div><!--Edit menu modal-->

<!-- Modal delete menu -->
<div id="delete_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Menu</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('client/delete_menu'); ?>
			<p>Are you sure?</p>
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="delete" value="Confirm" class="btn btn-primary">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal delete user end -->


<script>
//triggered when modal is about to be shown
$('#edit_menu').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var id = $(e.relatedTarget).data('id');
    var price = $(e.relatedTarget).data('price');
    var description = $(e.relatedTarget).data('description');

    //populate the textbox
    $(e.currentTarget).find('input[name="name"]').val(name);
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="price"]').val(price);
    $(e.currentTarget).find('textarea[name="description"]').val(description);
});
</script>
<script>
$('#delete_menu').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');


    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);

});
</script>

<script>
  $(document).ready(function() {
     $('#buyers').DataTable();
  } );
</script>
