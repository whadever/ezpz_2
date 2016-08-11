<div class="row" style="margin-bottom: 20px">
	<div class="col-xs-4">
		<h2>Manage Listing</h2>
	</div>
	<div class="col-xs-8">
		<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_listing" >Add Listing
	</a>
</div>

<div class="row" style="font-size : 14px; padding: 0 20px">
	<div class="col-xs-12">
		<table id="listings" class="table table-bordered  table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Photo</th>
					<th>Address</th>
					<th>City</th>
					
          <th>Size</th>
          <th>Area</th>
          <th>Seller</th>
          <th>Agent</th>
          <th>Buyer</th>
          <th>Type</th>
          <th>Status</th>
          <th>Price</th>
          <th>Action</th>
				</tr>
			</thead>
				<?php $i = 1; ?>
			<tbody>
				<?php foreach($listings as $listing): ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><a href="<?php echo base_url('listing/detail/'.$listing->id) ?>"><img src="<?php echo base_url()?>images/<?php echo $listing->image ?>"  width="60" height="30" alt=""></a></td>
						<td><?php echo $listing->address; ?></td>
						<td><?php echo $listing->city_name; ?></td>
            
            <td><?php echo $listing->width.' x '.$listing->length.' m'; ?></td>
            <td><?php echo $listing->width * $listing->length.'m'; ?><sup>2</sup></td>
            <td>
              <a href="" data-toggle="modal" data-target="#seller_info" data-name="<?php echo $listing->seller_name?>" data-email="<?php echo $listing->seller_email?>" data-phone="<?php echo $listing->seller_phone?>" ><?php echo $listing->seller_name; ?></a>
            </td>
            <td>
              <a href="" data-toggle="modal" data-target="#agent_info" data-name="<?php echo $listing->agent_name?>" data-email="<?php echo $listing->agent_email?>" data-phone="<?php echo $listing->agent_phone?>"><?php echo $listing->agent_name; ?></a>
            </td>
            <td>
              <a href="" data-toggle="modal" data-target="#buyer_info" data-name="<?php echo $listing->buyer_name?>" data-email="<?php echo $listing->buyer_email?>" data-phone="<?php echo $listing->buyer_phone?>"><?php echo $listing->buyer_name; ?></a>
            </td>
            <td>
              <?php echo $listing->type_name ?>
            </td>
            <td class="text-center"><?php if($listing->status == 1){echo '<button href="" class="btn btn-success" style="font-size: 11px">Sold</button>';} ?>
              
            </td>
            <td><?php echo rupiah($listing->price) ?></td>
						<td>
						  <span href="" data-toggle="modal" data-target="#delete_listing" data-id="<?php echo $listing->id?>" class="glyphicon glyphicon-trash pull-right" style="cursor:pointer; font-size: 20px"></span>
              
							<span href="" data-toggle="modal" 
              data-target="#edit_listing" 
              data-id="<?php echo $listing->id?>"
              data-image="<?php echo $listing->image ?>"
              data-address="<?php echo $listing->address ?>"
              data-city="<?php echo $listing->city_id ?>"
              data-district="<?php echo $listing->district ?>"
              data-width="<?php echo $listing->width ?>"
              data-length="<?php echo $listing->length ?>"
              data-seller="<?php echo $listing->seller_id ?>"
              data-agent="<?php echo $listing->agent_id ?>"
              data-type="<?php echo $listing->type_id ?>"
              data-price="<?php echo $listing->price ?>"
              data-description="<?php echo $listing->description ?>"
              class="glyphicon glyphicon-pencil pull-right" style="cursor:pointer;margin-right:2px;font-size: 20px"></span>
							

						</td>
					</tr>
					<?php $i++ ?>	
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Add Listing -->
<div id="add_listing" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Listing</h4>
      </div>
      <div class="modal-body">
        <div class="row">
  <?php echo form_open_multipart('listing/add') ?>
  <div class="col-md-6">
    <div class="row">
      <div class="col-xs-1"></div>
      <div class="col-xs-10">
        <div class="form-group">
          <label for="">Featured Photo :*</label>
          <img src="" name="image" alt="">
          <input type="file" name="image" class="form-control" >
        </div>

        <div class="form-group">
          <label for="">City :*</label>
          <select name="city"  class="form-control" required="1">
            <option value="">Select City</option>
            <?php foreach($cities as $city): ?>
              <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">District :*</label>
          <input type="text" name="district" placeholder="District" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Width :*</label>
          <input type="number" name="width" placeholder="Width" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Length :*</label>
          <input type="number" name="length" placeholder="Length" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Address :*</label>
          <textarea name="address" placeholder="Address" class="form-control" required="1"></textarea>
        </div>

      </div>
      <div class="col-xs-1"></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-xs-1"></div>
      <div class="col-xs-10">
        <div class="form-group">
          <label for="">Seller :*</label>
          <select name="seller"  class="form-control" required="1">
            <option value="">Select Seller</option>
            <?php foreach($sellers as $seller): ?>
              <option value="<?php echo $seller->id ?>"><?php echo $seller->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Agent :*</label>
          <select name="agent"  class="form-control" required="1">
            <option value="">Select Agent</option>
            <?php foreach($agents as $agent): ?>
              <option value="<?php echo $agent->id ?>"><?php echo $agent->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Type :*</label>
          <select name="type"  class="form-control" required="1">
            <option value="">Select Type</option>
            <?php foreach($types as $type): ?>
              <option value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Price :*</label>
          <div class="input-group">
            <span class="input-group-addon">Rp. </span>
            <input type="number" name="price" placeholder="Price" class="form-control" required="1">
          </div>
        </div>

        <div class="form-group">
          <label for="">Description :</label>
          <textarea name="description" rows="4" placeholder="Description" class="form-control"></textarea>
        </div>

        <div class="form-group">
          
        </div>
      </div>
      <div class="col-xs-1"></div>
    </div>
  </div>
  
</div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal Add Listing end -->

<!-- Modal delete Listing -->
<div id="delete_listing" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Listing</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('listing/delete'); ?>
			<p>Are you sure?</p>
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="delete" value="Confirm" class="btn btn-danger">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal delete Listing end -->

<!-- Modal edit Listing -->
<div id="edit_listing" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Listing</h4>
      </div>
      <div class="modal-body">
        <div class="row">
  <?php echo form_open_multipart('listing/update') ?>
  <div class="col-md-6">
    <div class="row">
      <div class="col-xs-1"></div>
      <div class="col-xs-10">
        <div class="form-group">
          <label for="">Featured Photo :*</label>
          <img src="" name="image" alt="">
          <input type="hidden" name="last_image" value="">
          <input type="file" name="image" class="form-control" >
        </div>

        <div class="form-group">
          <label for="">City :*</label>
          <select name="city"  class="form-control" required="1">
            <option value="">Select City</option>
            <?php foreach($cities as $city): ?>
              <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">District :*</label>
          <input type="text" name="district" placeholder="District" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Width :*</label>
          <input type="number" name="width" placeholder="Width" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Length :*</label>
          <input type="number" name="length" placeholder="Length" class="form-control" required="1">
        </div>

        <div class="form-group">
          <label for="">Address :*</label>
          <textarea name="address" placeholder="Address" class="form-control" required="1"></textarea>
        </div>

      </div>
      <div class="col-xs-1"></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-xs-1"></div>
      <div class="col-xs-10">
        <div class="form-group">
          <label for="">Seller :*</label>
          <select name="seller"  class="form-control" required="1">
            <option value="">Select Seller</option>
            <?php foreach($sellers as $seller): ?>
              <option value="<?php echo $seller->id ?>"><?php echo $seller->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Agent :*</label>
          <select name="agent"  class="form-control" required="1">
            <option value="">Select Agent</option>
            <?php foreach($agents as $agent): ?>
              <option value="<?php echo $agent->id ?>"><?php echo $agent->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Type :*</label>
          <select name="type"  class="form-control" required="1">
            <option value="">Select Type</option>
            <?php foreach($types as $type): ?>
              <option value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Price :*</label>
          <div class="input-group">
            <span class="input-group-addon">Rp. </span>
            <input type="number" name="price" placeholder="Price" class="form-control" required="1">
          </div>
        </div>

        <div class="form-group">
          <label for="">Description :</label>
          <textarea name="description" rows="4" placeholder="Description" class="form-control"></textarea>
        </div>

        <div class="form-group">
          
        </div>
      </div>
      <div class="col-xs-1"></div>
    </div>
  </div>
  
</div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal edit Listing end -->

<!-- Modal Seller Info  -->
<div id="seller_info" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Seller Information</h4>
      </div>
      <div class="modal-body">
          <strong>Seller Name :</strong>
          <p id="name"></p>
          <strong>Seller E-mail :</strong>
          <p id="email"></p>
          <strong>Seller Phone :</strong>
          <p id="phone"></p>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div><!-- Modal Seller Info end -->

<!-- Modal Agent Info  -->
<div id="agent_info" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Agent Information</h4>
      </div>
      <div class="modal-body">
          <strong>Agent Name :</strong>
          <p id="name"></p>
          <strong>Agent E-mail :</strong>
          <p id="email"></p>
          <strong>Agent Phone :</strong>
          <p id="phone"></p>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div><!-- Modal Agent Info end -->

<!-- Modal Buyer Info  -->
<div id="buyer_info" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Buyer Information</h4>
      </div>
      <div class="modal-body">
          <strong>Buyer Name :</strong>
          <p id="name"></p>
          <strong>Buyer E-mail :</strong>
          <p id="email"></p>
          <strong>Buyer Phone :</strong>
          <p id="phone"></p>
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div><!-- Modal Buyer Info end -->

<script>

$('#delete_listing').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');


    $(e.currentTarget).find('input[name="id"]').val(id);

});


$('#edit_listing').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    var address = $(e.relatedTarget).data('address');
    var image = $(e.relatedTarget).data('image');
    var district = $(e.relatedTarget).data('district');
    var city = $(e.relatedTarget).data('city');
    var width = $(e.relatedTarget).data('width');
    var length = $(e.relatedTarget).data('length');
    var seller = $(e.relatedTarget).data('seller');
    var agent = $(e.relatedTarget).data('agent');
    var type = $(e.relatedTarget).data('type');
    var price = $(e.relatedTarget).data('price');
    var description = $(e.relatedTarget).data('description');



    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('textarea[name="address"]').val(address);
    $(e.currentTarget).find('input[name="last_image"]').val(image);
    $(e.currentTarget).find('select[name="city"]').val(city);
    $(e.currentTarget).find('input[name="district"]').val(district);
    $(e.currentTarget).find('input[name="width"]').val(width);
    $(e.currentTarget).find('input[name="length"]').val(length);
    $(e.currentTarget).find('select[name="seller"]').val(seller);
    $(e.currentTarget).find('select[name="agent"]').val(agent);
    $(e.currentTarget).find('select[name="type"]').val(type);
    $(e.currentTarget).find('input[name="price"]').val(price);
    $(e.currentTarget).find('textarea[name="description"]').val(description);


});

//triggered when modal is about to be shown
$('#seller_info').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var email = $(e.relatedTarget).data('email');
    var phone = $(e.relatedTarget).data('phone');

    $(e.currentTarget).find('p[id="name"]').empty();
    $(e.currentTarget).find('p[id="email"]').empty();
    $(e.currentTarget).find('p[id="phone"]').empty();
    //populate the textbox
    $(e.currentTarget).find('p[id="name"]').append(name);
    $(e.currentTarget).find('p[id="email"]').append(email);
    $(e.currentTarget).find('p[id="phone"]').append(phone);
});

$('#agent_info').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var email = $(e.relatedTarget).data('email');
    var phone = $(e.relatedTarget).data('phone');

    $(e.currentTarget).find('p[id="name"]').empty();
    $(e.currentTarget).find('p[id="email"]').empty();
    $(e.currentTarget).find('p[id="phone"]').empty();
    //populate the textbox
    $(e.currentTarget).find('p[id="name"]').append(name);
    $(e.currentTarget).find('p[id="email"]').append(email);
    $(e.currentTarget).find('p[id="phone"]').append(phone);
});

$('#buyer_info').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var name = $(e.relatedTarget).data('name');
    var email = $(e.relatedTarget).data('email');
    var phone = $(e.relatedTarget).data('phone');

    $(e.currentTarget).find('p[id="name"]').empty();
    $(e.currentTarget).find('p[id="email"]').empty();
    $(e.currentTarget).find('p[id="phone"]').empty();
    //populate the textbox
    $(e.currentTarget).find('p[id="name"]').append(name);
    $(e.currentTarget).find('p[id="email"]').append(email);
    $(e.currentTarget).find('p[id="phone"]').append(phone);
});
</script>

<script>
	$(document).ready(function() {
   	 $('#listings').DataTable();
	} );
</script>
