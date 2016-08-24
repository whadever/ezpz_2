<div class="row">

<div class="col-md-3"></div>
	<div class="col-md-6">
		<h1 class="roboto headline">Driver Information</h1>
		<p align="center"><img src="<?php echo base_url() . '/' . $driver->photo ?>" class="driver-photo"></p>

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
				<td><?php echo $driver->telephone ?></td>
			</tr>
		</table>

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
<div class="col-md-3"></div>
</div>