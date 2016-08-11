<div class="row" style="margin-bottom: 20px">
	<div class="col-xs-4">
		<h2 style="padding:0; margin:0">Detail Listing</h2>
	</div>
	<div class="col-xs-8">
	<?php if ($listing->status != 1): ?>
		<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#sold" data-id="<?php echo $listing->id?>">Make it Sold !</a>
	<?php else: ?>
		<a href="#" class="btn btn-success pull-right" ">Sold !</a>
	<?php endif; ?>
	</div>
</div>

<div class="row" style="margin-bottom: 20px">
	<div class="col-md-6 text-center">
		<div class="row">
			<div class="col-xs-1"></div>
			<div class="col-xs-10">
				<img src="<?php echo base_url()?>images/<?php echo $listing->image ?>" width="500" class="img img-responsive" alt="">
			</div>
			<div class="col-xs-1"></div>
		</div>		
	</div>

	<div class="col-md-6">
		<div class="row">
			<div class="col-xs-6">
				<strong style="font-size: 18px">Address :</strong>
				<p style="font-size: 15px"><?php echo $listing->address ?></p>
				<strong style="font-size: 18px">District :</strong>
				<p style="font-size: 15px"><?php echo $listing->district ?></p>
				<strong style="font-size: 18px">City :</strong>
				<p style="font-size: 15px"><?php echo $listing->city_name ?></p>
				<strong style="font-size: 18px">Size :</strong>
				<p style="font-size: 15px"><?php echo $listing->width.' x '.$listing->length.' m' ?></p>
				<strong style="font-size: 18px">Type :</strong>
				<p style="font-size: 15px"><?php echo $listing->type_name ?></p>
				<strong style="font-size: 18px">Price :</strong>
				<p style="font-size: 15px"><?php echo rupiah($listing->price)?></p>
				
			</div>

			<div class="col-xs-6">
				<strong style="font-size: 18px">Seller :</strong>
				<p style="font-size: 15px"><a href="" data-toggle="modal" data-target="#seller_info" data-name="<?php echo $listing->seller_name?>" data-email="<?php echo $listing->seller_email?>" data-phone="<?php echo $listing->seller_phone?>" ><?php echo $listing->seller_name; ?></a></p>
				<strong style="font-size: 18px">Agent :</strong>
				<p style="font-size: 15px"><a href="" data-toggle="modal" data-target="#agent_info" data-name="<?php echo $listing->agent_name?>" data-email="<?php echo $listing->agent_email?>" data-phone="<?php echo $listing->agent_phone?>"><?php echo $listing->agent_name; ?></a></p>
				<?php if($listing->status != 0): ?>
				<strong style="font-size: 18px">Buyer :</strong>
				<p style="font-size: 15px"><a href="" data-toggle="modal" data-target="#buyer_info" data-name="<?php echo $listing->buyer_name?>" data-email="<?php echo $listing->buyer_email?>" data-phone="<?php echo $listing->buyer_phone?>"><?php echo $listing->buyer_name; ?></a></p>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6" style="">

		<h4>Description</h4>
    <div style="width:100%; float:left; display:inline-block">
    <?php if($listing->description == ''): ?>
		  <p>NO DESCRIPTION ASKLDJKL:ASJDKL:ASJDKL:ASJDA:SLKDJAKSL:DJAL:SKJDA:SLKJDASKL:JDASL:KJDASDKLJ </p>
    <?php else: ?>
      <p><?php echo $listing->description ?></p>
    <?php endif; ?>
    </div>
	</div>
  <div class="col-md-6"></div>
</div>

<!-- Modal Sell Listing -->
<div id="sold" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Listing</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('listing/sold'); ?>
			<div class="form-group">
				<label for="">Sold To:</label>
				<select name="buyer" class="form-control">
					<option value="">Select Buyer</option>
					<?php foreach($buyers as $buyer): ?>
						<option value="<?php echo $buyer->id ?>"><?php echo $buyer->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="id" value="">
        <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal Sell Listing end -->

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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div><!-- Modal Buyer Info end -->

<script>

$('#sold').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');


    $(e.currentTarget).find('input[name="id"]').val(id);

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