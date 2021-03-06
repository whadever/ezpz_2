	<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		    padding: 8px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border-top: none;
		}
		.found-info{
			padding:20px;
			padding-top: 5px;
			border-top:4px solid #34495e;
			margin-bottom: 20px;
		}
	</style>
<div class="container">
	<div class="row" style="margin-bottom:3%;margin-top:3%;">
	<div class="col-md-4 col-xs-12">
		<div class="found-info">
		<div class="row text-center" id="status">
			<h2 class="roboto headline">Order Status</h2>
			<h3 class="roboto" id="statusOrder">Your order has been made</h3>
			<h3 class="roboto" id="statusDriver"  align="center">Driver Enroute to Restaurant</h3>
			
			<select name="" id="rate" onchange="rate_driver()" style="display:none">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<a class="btn btn-primary" style="margin:10px;" href="tel:<?php echo $driver->telephone?>" ><span class="fa fa-phone" style="margin-right:10px;"></span>Call Driver</a>
			<a class="btn btn-primary" style="margin:10px;" href="sms:<?php echo $driver->telephone?>"><span class="fa fa-envelope" style="margin-right:10px;"></span>Text Driver</a>

		</div>
		</div>
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="found-info">	
				<h2 class="roboto headline">Driver Information</h2>
				<p align="center">
				<div class="profile-picture" style="background-image : url(<?php echo base_url().$driver->photo ?>); " id="edit-prof-pic"></div>
				</p>

				<table class="table driver-info">
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
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="found-info">
				<h2 class="roboto headline">Order Information</h2>
				<table class="table driver-info">
					<tr>
						<th width="30%">Order Number</th>
						<td><?php echo $order->code ?></td>
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
</div>

<script src="<?php echo base_url() ?>js/jquery.barrating.min.js"></script>

<script type="text/javascript">
   
    window.addEventListener('load', function () {
  // At first, let's check if we have permission for notification
  // If not, let's ask for it
  if (window.Notification && Notification.permission !== "granted") {
    Notification.requestPermission(function (status) {
      if (Notification.permission !== status) {
        Notification.permission = status;
      }
    });
  }
  if (window.Notification && Notification.permission === "granted") {
      
      var options = {
      	body: "Your driver is <?php echo $driver->firstname . ' '. $driver->lastname ?> ",
      	icon: "<?php echo base_url('assets/icon.jpg') ?>"
      }
        var n = new Notification("Driver Found ! " , options);
        
      
    }

 
});

</script>
<script>
var i = 0;
function auto_load(){
        $.ajax({
          url: "<?php echo base_url('order/tracking/'.$order->code) ?>",
          type: 'GET',
          cache: false,
          success: function(result){

          	if(result == 3)
          	{
          		if (window.Notification && Notification.permission !== "granted") {
				    Notification.requestPermission(function (status) {
				      if (Notification.permission !== status) {
				        Notification.permission = status;
				      }
				    });
				  }
				  if (window.Notification && Notification.permission === "granted" && i == 0) {
			      	var options = {
				      	body: "Driver has bought your food and now enroute to your place",
				      	icon: "<?php echo base_url('assets/icon.jpg') ?>"
				      }
				    var n = new Notification("EZPZ Status Update", options );
				        i = 1;
				      
				    }
             	document.getElementById("statusDriver").innerHTML = "Driver have bought your order and now enroute to your home";
             	
             	$('#cancelorder').empty();
             	setTimeout(auto_load,3000);

          	}else if(result == 4)
          	{
          		document.getElementById("statusOrder").innerHTML = " ";
          		
          		document.getElementById("statusDriver").innerHTML = "Your order have been completed!";
          		if (window.Notification && Notification.permission !== "granted") {
				    Notification.requestPermission(function (status) {
				      if (Notification.permission !== status) {
				        Notification.permission = status;
				      }
				    });
				  }
          		
          		if (window.Notification && Notification.permission === "granted") {
      				
          			var options = {
				      	body: "Your order has finished, please rate the driver",
				      	icon: "<?php echo base_url('assets/icon.jpg') ?>"
				      }
			      
			        var n = new Notification("EZPZ Status Update", options );
			        
			      
			    }
          		
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
        		swal({   
        			title: "Thank You",   
        			text: "Thank You For Your Participantion", 
        			type: "success",  
        			timer: 2000,   
        			showConfirmButton: false 
        		});
        		setTimeout(function(){window.location.assign("<?php echo base_url('user') ?>")},3000);	
        	}
        });
}
 
</script>

<script>
$(document).ready(function(){

	auto_load();

});
</script>