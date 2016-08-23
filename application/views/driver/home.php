<div class="row">
			<h1 style="margin-bottom:25px;">You have <?php echo count($orders) ?> requests</h1>
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
							Code
						</td>
						<td>
							Status
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
							<?php echo $order->address  ?>
						</td>
						<td>
							<?php echo $order->code ?>
						</td>
						<td>
							<?php echo $order->status ?>
						</td>
						<td>
							<a class="btn btn-primary" href="<?php echo base_url('driver/accept_order/'.$order->id) ?>" >Accept</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
		</table>

	</div>
		
</div>

<script>
	$(document).ready(function() {
   	 $('#orders').DataTable();
	} );
</script>