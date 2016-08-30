<div class="container">
	<div class="row">
		<h1>Order Details</h1>
		
		<table class="table table-bordered">
		
			<thead>
				<tr>
					<th>
						Items
					</th>
					<th>
						Quantity
					</th>
					<th>
						Price
					</th>
					<th>
						Subtotal
					</th>
				</tr>
			</thead>
			
			

			<tbody>

				<?php foreach($order_detail as $detail): ?>

				<tr>
					<td>
						<?php echo $detail->name ?>
					</td>
					<td>
						<?php echo $detail->qty ?>
					</td>
					<td>
						<?php echo NZD($detail->price) ?>
					</td>
					<td>
						<?php echo NZD($detail->sub_total) ?>
					</td>
				</tr>

				<?php endforeach ?>
			</tbody>	

		</table>

		

	</div>
</div>