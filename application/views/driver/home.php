<div class="container" style="padding-bottom:20px;padding-top:20px;">
<div class="row">
			<h2 style="margin-bottom:25px; margin-left:10px;">You have <?php echo count($orders) ?> requests</h2>
</div>
<div class="row">
	<div class="col-xs-12" id="tableHome">
		<table class="table table-bordered" id="orders" >
				<thead>
					<tr>
						<td>
							Order ID
						</td>	
						<td>
							Client's Name
						</td>
						<td>
							Restaurant's Name
						</td>
						<td>
							Address
						</td>
						<td>
							Earnings
						</td>
				
						<td>
							&nbsp;
						</td>
					</tr>
				</thead>

				<tbody>
					<?php foreach($orders as $order): ?>
					<tr>
						<td>
							<?php echo $order->id  ?>
						</td>
						<td>
							<?php echo $order->username  ?>
						</td>
						<td>
							<?php echo $order->restaurant  ?>
						</td>
						<td>
							<a href="#" data-toggle="modal" data-target="#maps" data-address="<?php echo urlencode($order->address) ?>"><?php echo $order->address  ?></a>
						</td>
						<td>
							<?php echo NZD($order->delivery_cost * 70 / 100 - ($order->delivery_cost * 70/100 * 20/100) )  ?>
						</td>
						<td>
							<a class="btn btn-primary" href="<?php echo base_url('driver/accept_order/'.$order->code) ?>" >Accept</a>
						</td>
						
						
					</tr>
					<?php endforeach; ?>
				</tbody>
		</table>

	</div>
		
</div>
</div>

<script>
	$(document).ready(function() {
   	 $('#orders').DataTable();
	} );
</script>

<!-- Modal -->
<div class="modal fade" id="maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      	<div class="modal-body">
			
			<iframe id="map_location" style="width:100%; height:450px" >
			</iframe>
			

    	</div>
    	
    </div>
  </div>
</div>

<script>
//triggered when modal is about to be shown
$('#maps').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var address = $(e.relatedTarget).data('address');
     var frame = document.getElementsByTagName("iframe")[0];
     var att = document.createAttribute("src");
     att.value = "https://www.google.com/maps/embed/v1/place?q="+address+"&zoom=13&key=AIzaSyBcbISjaXDKeBwFCoxybJ_4cbvJs1SOi4w";
     frame.setAttributeNode(att)
     //populate the textbox

});
</script>



