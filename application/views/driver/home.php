<div class="row">
			<h1 style="margin-bottom:25px;">You have xx requests</h1>
</div>
<div class="row">
		<table class="table table-bordered" id="orders" >
			<thead>
				<tr>
					<td>
						Client's Name
					</td>
					<td>
						Location
					</td>
					<td>
						Distance
					</td>
					<td>
						Price
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Irvan Winata
					</td>
					<td>
						Kelapa Gading
					</td>
					<td>
						20 Km
					</td>
					<td>
						<?php echo rupiah(102010) ?>
					</td>
				</tr>
				<tr>
					<td>
						Irvan Winata
					</td>
					<td>
						Kelapa Gading
					</td>
					<td>
						20 Km
					</td>
					<td>
						Rp. 100,000
					</td>
				</tr>
				<tr>
					<td>
						Irvan Winata
					</td>
					<td>
						Kelapa Gading
					</td>
					<td>
						20 Km
					</td>
					<td>
						Rp. 100,000
					</td>
				</tr>
				<tr>
					<td>
						Irvan Winata
					</td>
					<td>
						Kelapa Gading
					</td>
					<td>
						20 Km
					</td>
					<td>
						Rp. 100,000
					</td>
				</tr>
				<tr>
					<td>
						Irvan Winata
					</td>
					<td>
						Kelapa Gading
					</td>
					<td>
						20 Km
					</td>
					<td>
						Rp. 100,000
					</td>
				</tr>
			</tbody>
		</table>

	</div>

	<script>
	$(document).ready(function() {
   	 $('#orders').DataTable();
	} );
</script>