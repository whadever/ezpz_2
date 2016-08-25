<div class="row" style="margin-bottom:10%;">

	<div class="col-md-1 col-xs-12"></div>
	
	<div class="col-md-10 col-xs-12">
		
		
		<div class="row text-center" id="status">
			<h1 class="roboto headline">Order Status</h1>
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
				<h1 class="roboto headline">Driver Information</h1>
				<p align="center">
				<div class="profile-picture" style="background-image : url(<?php echo base_url().$driver->photo ?>); " id="edit-prof-pic"></div>
				</p>

				<table class="table table-bordered driver-info">
					<tr>
						<td>Name</td>
						<td><?php echo $driver->firstname.' '.$driver->lastname ?></td>
					</td>
					<tr>
						<td>Email</td>
						<td><?php echo $driver->email ?></td>
					</td>
					<tr>
						<td>Phone</td>
						<td><a href="tel:<?php echo $driver->telephone ?>"><?php echo $driver->telephone ?></a></td>
					</tr>
				</table>
			</div>

			<div class="col-md-6 col-xs-12">
				
				<h1 class="roboto headline">Order Information</h1>
				<table class="table table-bordered driver-info">
					<tr>
						<td>Order ID</td>
						<td><?php echo $order->id ?></td>
					</td>
					<tr>
						<td>Total Quantity</td>
						<td><?php echo $order->total_qty ?></td>
					</td>
					<tr>
						<td>Total Price</td>
						<td>$<?php echo $order->total_price ?></td>
					</tr>
					<tr>
						<td>Deliver To</td>
						<td><?php echo $order->address ?></td>
					</tr>
					<tr>
						<td>ETA</td>
						<td><?php echo $order->estimation_time ?> Minutes</td>
					</tr>
					<tr>
						<td>Distance</td>
						<td><?php echo $order->distance ?> Km</td>
					</tr>
				</table>

			</div>

		</div>		


	</div>


	<div class="col-md-1 col-xs-12"></div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery.barrating.min.js"></script>

<script type="text/javascript">
   
</script>
<script>

function auto_load(){
        $.ajax({
          url: "<?php echo base_url('order/tracking/'.$order->id) ?>",
          type: 'GET',
          cache: false,
          success: function(result){
          	if(result == 3)
          	{
             	document.getElementById("statusDriver").innerHTML = "Driver Have Bought Your Order and Now Enroute to Your Home";

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