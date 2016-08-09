<div class="container-fluid image-full-section">
	<div class="row">
		<form role="form">
		<div class="form-group center-block">
			<div class="input-group">
				<input type="text" name="restaurant-search" class="form-control" id="restaurant-search" placeholder="Search for restaurant name">
				<span class="input-group-btn">
 				<button class="btn btn-default" type="submit">
          		<span class="glyphicon glyphicon-search"></span>
			</div>
		</div>
	</form>
	</div>
</div>
<div class="container-fluid padding-top-five">
	<h2 style="margin-left:1%;"><?php echo $cuisine_name ?></h2>
	<hr></hr>
	<?php 

	$counter=0;
	//Get Restaurant
	foreach($restaurants as $restaurant): ?>
		<?php 
		//Put Div row in every first of three
		if($counter % 3 ==  0): ?>
			<div class="row">
		<?php endif; ?>

			<div class="col-md-4 col-xs-12">
				<div class="panel panel-default panel-horizontal">
				    <div class="panel-body">
				        <p class="brand"><a href="<?php echo base_url('restaurant/detail/'.$restaurant->username) ?>"><?php echo $restaurant->username; ?></a></p>
						<p><?php echo $restaurant->address ?></p>
						<p><?php echo $restaurant->opentime.' - '.$restaurant->closetime?></p>
				    </div>
				    <div class="panel-heading">
				        <p>Image</p>
				    </div>
				</div>
			</div>
		<?php
		//Put Div close in every three of three 
		if($counter % 3 ==  2): ?>
			</div>
		<?php endif; $counter++;?>
	<?php endforeach;?>
</div>