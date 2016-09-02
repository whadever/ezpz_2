<style>
	.form-control{
		background-color: #2c3e50;
		color: white;
		border:none;
	}

	#go{
		background-color: white;
		color: #2c3e50;
		border:1px solid #2c3e50;
		border-radius: 0px;
	}
</style>

<!--if monthly-->

<div class="row" style="margin-bottom: 10px; margin-top: 20px; ">
	<div class="col-sm-4"></div>
	<div class="col-xs-12 col-sm-4">

		<?php echo form_open('driver/my_earnings/'.$this->session->userdata('user_id').'/monthly') ?>
			
			<select name="year" class="form-control" id="year" style="width:30%; display:inline">
				<?php 
					$year = 2016;
					for($i = $year; $i <= date('Y'); $i++){
						if($i == $year){
							$selected = 'selected';
						}else{
							$selected = '';
						}
						echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
					}
				 ?>
			</select>
			
			<select name="month" class="form-control" id="month" style="width:40%; display:inline">
				<option selected value='01' <?php if($month == 'January') echo 'selected';?>>January</option>
			    <option value='02' <?php if($month == 'February') echo 'selected';?>>February</option>
			    <option value='03' <?php if($month == 'March') echo 'selected';?>>March</option>
			    <option value='04' <?php if($month == 'April') echo 'selected';?>>April</option>
			    <option value='05' <?php if($month == 'May') echo 'selected';?>>May</option>
			    <option value='06' <?php if($month == 'June') echo 'selected';?>>June</option>
			    <option value='07' <?php if($month == 'July') echo 'selected';?>>July</option>
			    <option value='08' <?php if($month == 'August') echo 'selected';?>>August</option>
			    <option value='09' <?php if($month == 'September') echo 'selected';?>>September</option>
			    <option value='10' <?php if($month == 'October') echo 'selected';?>>October</option>
			    <option value='11' <?php if($month == 'November') echo 'selected';?>>November</option>
			    <option value='12' <?php if($month == 'December') echo 'selected';?>>December</option>
			</select>
			<input type="submit" name="submit" value="GO" id="go" class="btn pull-right">	
		<?php echo form_close() ?>
	</div>
	<div class="col-sm-4"></div>
</div>

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<!-- <table class="table" id="earnings">
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
 -->
	 <div class="wrap">
	 	<div id="chartContainer"></div>
	 </div>
	</div>
	<div class="col-sm-3"></div>
</div>

<script>
	FusionCharts.ready(function(){
		var date = 1;
      var revenueChart = new FusionCharts({
        "type": "bar2d",
        "renderAt": "chartContainer",
        "width" : "600",
        "height": "800",
        "dataFormat": "json",
        "dataSource": {
            "chart": {
            "caption": "My Earnings",
            "subCaption": "<?php echo $month ?>",
            "xAxisName": "Day",
            "yAxisName": "Revenues (In NZD)",
            "numberPrefix": "$",
           

	        "paletteColors": "#2c3e50",
	        "bgColor": "#ffffff",
	        "showBorder": "0",
	        "showCanvasBorder": "0",
	        "usePlotGradientColor": "0",
	        "plotBorderAlpha": "10",
	        "placeValuesInside": "1",
	        "valueFontColor": "#ffffff",
	        "showAxisLines": "1",
	        "axisLineAlpha": "25",
	        "divLineAlpha": "10",
	        "alignCaptionWithCanvas": "0",
	        "showAlternateVGridColor": "0",
	        "captionFontSize": "14",
	        "subcaptionFontSize": "14",
	        "subcaptionFontBold": "0",
	        "toolTipColor": "#ffffff",
	        "toolTipBorderThickness": "0",
	        "toolTipBgColor": "#000000",
	        "toolTipBgAlpha": "80",
	        "toolTipBorderRadius": "2",
	        "toolTipPadding": "5"
           },
          "data": [
          	<?php for($i = 1; $i <= $days; $i++): if($i < 10) $i = '0'.$i ?>
          	  	{
          	  		"label" : "<?php echo $i ?>",
          	  		"value" : "<?php echo $this->driver_model->get_earnings_sum($this->session->userdata('user_id'),$date.'-'.$i)->row()->driver_earnings ?>"
          	  	},
          	<?php endfor; ?>
           ]
        }
    });

    revenueChart.render();
    document.getElementsByTagName("tspan").innerHTML = "";
})
</script>