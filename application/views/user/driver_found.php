	<div class="row" style="margin-bottom:5%;">

	<div class="col-md-1 col-xs-12"></div>
	
	<div class="col-md-10 col-xs-12">
		
		
		<div class="row text-center" id="status">
			<h2 class="roboto headline">Order Status</h2>
			<h2 class="roboto headline">Your order has been made</h2>
			<h2 class="roboto" id="statusDriver"  align="center">Driver Enroute to Restaurant</h2>
		
			<select name="" id="rate" onchange="rate_driver()" style="display:none">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>

		</div>
		
		<div class="row">

			<div class="col-md-6 col-xs-12">
				<h2 class="roboto headline">Driver Information</h2>
				<p align="center">
				<div class="profile-picture" style="background-image : url(<?php echo base_url().$driver->photo ?>); " id="edit-prof-pic"></div>
				</p>

				<table class="table table-striped driver-info">
					<tr>
						<th>Name</th>
						<td><?php echo $driver->firstname.' '.$driver->lastname ?></td>
					</td>
					<tr>
						<th>Email</th>
						<td><?php echo $driver->email ?></td>
					</td>
					<tr>
						<th>Phone</th>
						<td><a href="tel:<?php echo $driver->telephone ?>"><?php echo $driver->telephone ?></a></td>
					</tr>
				</table>
			</div>

			<div class="col-md-6 col-xs-12">
				
				<h2 class="roboto headline">Order Information</h2>
				<table class="table table-striped driver-info">
					<tr>
						<th width="30%">Order ID</th>
						<td><?php echo $order->id ?></td>
					</td>
					<tr>
						<th>Total Quantity</th>
						<td><?php echo $order->total_qty ?></td>
					</td>
					<tr>
						<th>Total Price</th>
						<td><?php echo NZD($order->total_price) ?></td>
					</tr>
					<tr>
						<th>Delivery Cost</th>
						<td><?php echo NZD($order->delivery_cost) ?></td>
					</tr>
					<tr>
						<th>Deliver To</th>
						<td><?php echo $order->address ?></td>
					</tr>
					<tr>
						<th>ETA</th>
						<?php 
						if($order->estimation_time < 60){
			              echo '<td>'.$order->estimation_time.' Minutes</td>';
			            }else{
			              $hour = floor($order->estimation_time / 60);
			              $min = $order->estimation_time % 60;

			              echo '<td>'.$hour.' Hour(s) '.$min.' Minutes</td>';
			              
			            }

						 ?>
						
					</tr>
					<tr>
						<th>Distance</th>
						<td><?php echo $order->distance ?> Km</td>
					</tr>
				</table>

			</div>

		</div>		


	</div>


	<div class="col-md-1 col-xs-12"></div>

</div>

<div class="row" id="cancel" style="margin-bottom: 20px">
    <div class="col-lg-2"></div>
      <div class="col-lg-8 text-center">
        <a href="<?php echo base_url('order/cancel_order/'.$order->code) ?>" class="btn btn-primary">Cancel Order</a>
      </div>
    <div class="col-lg-2"></div>
  </div>

<script src="<?php echo base_url() ?>js/jquery.barrating.min.js"></script>

<script type="text/javascript">
   
</script>
<script>

function auto_load(){
        $.ajax({
          url: "<?php echo base_url('order/tracking/'.$order->code) ?>",
          type: 'GET',
          cache: false,
          success: function(result){

          	if(result == 3)
          	{
             	document.getElementById("statusDriver").innerHTML = "Driver Have Bought Your Order and Now Enroute to Your Home";
             	$('#cancel').empty();
             	setTimeout(auto_load,3000);
          	}else if(result == 4)
          	{
          		document.getElementById("statusDriver").innerHTML = "Your Order Have Been Completed!";
          		
          		
          		
			      $('#rate').barrating({
			        theme: 'fontawesome-stars'
			      });
			  
          		
          	}else{
          		setTimeout(auto_load,3000);
          	}
            
          } 
        });

        
}

function rate_driver(){

	var rating = $('#rate').val();


	$.ajax({
        	url:"<?php echo base_url('user/rate_driver/'.$driver->id.'/'.$order->code) ?>",
        	type: 'POST',
        	data: {rating : rating},
        	cache: false,
        	success: function(result){
        		alert('Thank you for your participation');
        		window.location.assign("<?php echo base_url('user') ?>");
        	}
        });
}
 
</script>

<script>
$(document).ready(function(){

	auto_load();

});
</script>