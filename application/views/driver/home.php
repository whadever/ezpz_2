<div class="row">
			<h1 style="margin-bottom:25px;">You have <?php echo count($orders) ?> requests</h1>
</div>
<div class="row">
	<div class="col-xs-12">
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
							Items
						</td>
						<td>
							Code
						</td>
						<td>
							Total Quantity
						</td>
						<td>
							Total Price
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
							<?php echo $order->name  ?>
						</td>
						<td>
							<?php echo $order->code ?>
						</td>
						<td>
							<?php echo $order->total_qty." Items" ?>
						</td>
						<td>
							<?php echo NZD($order->total_price) ?>
						</td>
						<td>
							<?php echo $order->status ?>
						</td>
						<td>
							<button class="btn btn-primary">Accept</button>
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