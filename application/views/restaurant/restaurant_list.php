<div class="container" id="restaurant-list">
	<h2 style="margin-left:1%;"><?php echo $cuisine_name ?></h2>
	<hr>
	<?php 

	$counter=0;
	//Get Restaurant
	if($restaurants):
	foreach($restaurants as $restaurant): ?>
		<!-- Put Div row in every first of three -->
		<?php if($counter % 3 ==  0): ?>
			<div class="row">
		<?php endif; ?>

			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="panel panel-default panel-horizontal" style="height:200px;">
					
					    <div class="panel-body" >
					        <p class="brand">
					        	<a href="<?php echo base_url('restaurant/detail/'.$restaurant->name) ?>">
					        	<?php echo $restaurant->name; ?>
					        	</a>
					        </p>
							<p><?php echo wordlimiter($restaurant->address,5).'...' ?></p>
							<div class="hidden-xs">
							<?php $closed = 1; ?>
							<?php foreach ($restaurant_time as $time): ?>
								<?php if($time->restaurant_id == $restaurant->id && $time->day == date('l')){
									
									echo "<p>".date('H:i',strtotime($time->opentime))." - ".date('H:i',strtotime($time->closetime))."</p>";
									$closed = 0;
								} 
								?>
							<?php endforeach ?></div>
							<?php echo $closed == 1 ? "<p style='color:red'>Closed Today</p>" : "<p style='color:green'>Open Today</p>" ?>
					    </div>
					    <a href="<?php echo base_url('restaurant/detail/'.$restaurant->name) ?>">
						    <div class="panel-heading" style="background-image: url('<?php echo base_url().$restaurant->thumb ?>');background-size: cover;background-repeat: no-repeat;background-position: center center; height:198px;">
						        &nbsp;
						    </div>
				    	</a>
				</div>
			</div>
		
		<?php
		//Put Div close in every three of three 
		if($counter % 3 ==  2): ?>
			</div>
		<?php endif; $counter++;?>
	<?php endforeach;?>
<?php else: ?>
	<h2>No Restaurant in this section</h2>
<?php endif; ?>
</div>

<script>

var test = [""];
<?php $i = 0; ?>

<?php foreach ($lists as $list): ?>
	test[<?php echo $i ?>] = "<?php echo $list->name ?>";
	<?php $i++; ?>
<?php endforeach; ?>

$("#restaurant-search").typeahead({

                        minLength: 0,
                        items: 4,
                        source: test,   
                    });

</script>
