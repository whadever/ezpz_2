<div class="row" style="margin-top: 10px">
	<div class="col-sm-4"></div>
		<div class="col-xs-12 col-sm-4">
			
			<div class="form-group">
				<select name="period" onchange="change_period()" class="form-control" id="period" style="background-color: #2c3e50; color: white">
					<option value="monthly" <?php if($this->uri->segment(4) == 'monthly' || $this->uri->segment(4) == '')echo 'selected';?>>Monthly</option>
					<option value="daily" <?php if($this->uri->segment(4) == 'daily') echo 'selected';?>>Daily</option>
				</select>
			</div>
		
		</div>
	<div class="col-sm-4"></div>
</div>

<!--if monthly-->
<?php if($this->uri->segment(4) == 'monthly' ||  $this->uri->segment(4) == ''): ?>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-xs-12 col-sm-4">
		<?php echo form_open('driver/my_earnings/'.$this->session->userdata('user_id').'/monthly') ?>
			
			<select name="year"  id="year" style="width:40%">
				<?php 
					$year = 2016;
					for($i = $year; $i <= date('Y'); $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				 ?>
			</select>
			
			<select name="month" id="month">
				<option selected value='01'>January</option>
			    <option value='02'>February</option>
			    <option value='03'>March</option>
			    <option value='04'>April</option>
			    <option value='05'>May</option>
			    <option value='06'>June</option>
			    <option value='07'>July</option>
			    <option value='08'>August</option>
			    <option value='09'>September</option>
			    <option value='10'>October</option>
			    <option value='11'>November</option>
			    <option value='12'>December</option>
			</select>
			<input type="submit" name="submit" value="GO" class="btn btn-primary">	
		<?php echo form_close() ?>
	</div>
	<div class="col-sm-4"></div>
</div>
<!--if daily-->
<?php elseif($this->uri->segment(4) == 'daily'): ?>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-xs-12 col-sm-4">
		<?php echo form_open('driver/my_earnings'.$this->session->userdata('user_id').'/daily') ?>
		
		<?php echo form_close() ?>
	</div>
	<div class="col-sm-4"></div>
</div>

<?php endif; ?>

<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<table class="table" id="earnings">
			<thead>
				<tr>
					<th>No.</th>
					<th>Order Number</th>
					<th>Earnings</th>
					<th>Date</th>	
				</tr>
			</thead>
			
			<tbody>
				<?php $i = 1; ?>
				<?php $total_earnings = 0; ?>
				<?php foreach($earnings as $earning): ?>
					<tr>
						<td><?php echo $i ?></td>	
						<td><?php echo $earning->code ?></td>
						<td><?php echo NZD($earning->driver_earnings) ?></td>
						<td><?php echo $earning->date ?></td>
					</tr>
				<?php $i++ ?>
				<?php $total_earnings += $earning->driver_earnings ?>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"></td>
					<td><strong>Total</strong></td>
					<td style="color: green"><?php echo NZD($total_earnings) ?></td>
				</tr>
			</tfoot>
		</table>

	</div>
	<div class="col-sm-2"></div>
</div>

<script>
	function change_period(){
		
		if($('#period').val() == 'monthly'){
		
			window.location.assign("<?php echo base_url('driver/my_earnings/'.$this->session->userdata('user_id').'/monthly') ?>");
		}else if($('#period').val() == 'daily'){
			window.location.assign("<?php echo base_url('driver/my_earnings/'.$this->session->userdata('user_id').'/daily') ?>");

		}
	}
</script>