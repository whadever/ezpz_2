<?php echo form_open() ?>
<div class="container-fluid image-full-section restaurant-photo">
</div>
	
		
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 restaurant-detail">
					
				<h2 style="display:inline;"><?php echo $restaurant->username.' ' ?></h2>
				<span class="rating">
					<h3 class="label label-info" style="font-size:12px;display:inline;line-height:15px;">3 / 5</h3><p style="font-size:10px;display:inline;margin-left:2px;">100 votes</p>
				</span>
				<p><?php echo $restaurant->cuisine.' ' ?></p>
				<p><?php echo $restaurant->opendays.' '.date('H:i',strtotime($restaurant->opentime)).' - '.date('H:i',strtotime($restaurant->closetime)) ?></p>
				<p><?php echo $restaurant->phone.' ' ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-7">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">List Menu</h3>
			  </div>
			  <div class="panel-body">
			    	<table class="table table-striped">
			    		<thead>
			    			<tr>
			    				<td>No.</td>
			    				<td>Name</td>
			    				<td>Price</td>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			<?php $i = 1 ?>
			    			<?php foreach($dishes as $dish): ?>
			    			<tr>
			    				<td><?php echo $i ?></td>
			    				<td><?php echo $dish->name ?></td>
			    				<td><?php echo $dish->price ?></td>
			    			</tr>
			    			<?php $i++; ?>
			    			<?php endforeach; ?>
			    		</tbody>
			    	</table>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php echo form_close() ?>