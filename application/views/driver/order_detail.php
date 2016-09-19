<style>
	.detail .row{
		margin-bottom: 10px;
	}	
</style>
<div class="container" style="padding-bottom:5px;">
	<div class="row">
		<h1>Order Details</h1>
	</div>
	
		
			<div class="row">
				<h3>Order #<?php echo $order_history->code?></h3>	
			</div>

			<div class="row">
				<div class="col-md-4 col-xs-6 detail">
					<div class="row"><strong>Order Date</strong></div>
					<div class="row"><strong>Restaurant Name</strong></div>
					<div class="row"><strong>Restaurant Address</strong></div>
					<div class="row"><strong>Customer Name</strong></div>
					<div class="row"><strong>Delivery Address</strong></div>
					<div class="row"><strong>Distance</strong></div>
				</div>
				<div class="col-md-8 col-xs-6 detail">
					<div class="row"><?php echo date('d F Y, h:mA',strtotime($order_history->date)) ?></div>
					<div class="row"><?php echo $restaurant->name ?></div>
					<div class="row"><?php echo $restaurant->address ?></div>
					<div class="row"><?php echo $user->firstname ?>&nbsp;<?php echo $user->lastname ?></div>
					<div class="row"><?php echo $user->address ?></div>
					<div class="row"><?php echo $order_history->distance ?>&nbsp;km</div>
				</div>
			</div>

		
			<div class="row">
				<h3>Items Ordered</h3>
			</div>
	
			<div class="row">
				<div class="col-md-6">
				<div class="row">
				<table class="table">		
					
					<?php $foodtotal=0 ?>
					<tbody>

						<?php foreach($order_detail as $detail): ?>

						<tr>
							<td>
								<?php echo $detail->name ?>
							</td>
							<td>
								x&nbsp;<?php echo $detail->qty ?>
							</td>
							<td align="right">
								<?php echo NZD($detail->price) ?>
							</td>
							<td align="right">
								<?php $foodtotal+=$detail->sub_total ?>
								<?php echo NZD($detail->sub_total) ?>
							</td>
						</tr>

						<?php endforeach ?>
						<tr>
							<th colspan="3">Total food price</th>
							<td align="right"><?php echo NZD($foodtotal) ?></td>
						</tr>
						<tr>
							<th colspan="3">Delivery cost</th>
							<td align="right"><?php echo NZD($order_history->delivery_cost) ?></td>
						</tr>
						<tr>
							<th colspan="3">Total price</th>
							<td align="right"><?php echo NZD($order_history->total_price) ?></td>
						</tr>
						<tr>
							<th colspan="3">Your Earning</th>
							<td align="right"><?php echo NZD($driver_earnings) ?></td>
						</tr>
					</tbody>	

				</table>
				</div>
				</div>
			</div>
		

	
</div>