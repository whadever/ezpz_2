
<div class="container-fluid padding-top-five">
	<h2 style="margin-left:1%;"><?php echo $cuisine_name ?></h2>
	<hr>

	<?php 

	$counter=0;
	//Get Restaurant
	foreach($restaurants as $restaurant): ?>

		 
		<!-- Put Div row in every first of three -->
		<?php if($counter % 3 ==  0): ?>
			<div class="row">
		<?php endif; ?>

			<div class="col-md-4 col-xs-12">
				<div class="panel panel-default panel-horizontal">
				    <div class="panel-body">
				        <p class="brand">
				        	<a href="<?php echo base_url('restaurant/detail/'.$restaurant->name) ?>">
				        	<?php echo $restaurant->name; ?>
				        	</a>
				        </p>
						<p><?php echo $restaurant->address ?></p>
						<?php $closed = 1; ?>
						<?php foreach ($restaurant_time as $time): ?>
							<?php if($time->restaurant_id == $restaurant->id && $time->day == date('l')){
								
								echo "<p>".$time->opentime." - ".$time->closetime."</p>";
								$closed = 0;
							} 
							?>
						<?php endforeach ?>
						<?php echo $closed == 1 ? "<p>... - ...</p><p>Closed Today</p>" : "<p>Open Today</p>" ?>
				    </div>
				    <div class="panel-heading" style="background-image: url('<?php echo base_url().$restaurant->photo ?>');background-size: cover;background-repeat: no-repeat;background-position: center center; ">
				        &nbsp;
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
