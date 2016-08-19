<!--What you can do div end, cuisine selection start-->
<div class="row">
<div class="food">
	<div class="container">
		<div class="row text-center">
			<h1 style="margin-bottom:25px;">Cuisine Selections</h1>
		</div>
		
		<?php 

		$counter=0;
		//Get Restaurant
		foreach($cuisines as $cuisine): 

		?>
			 
			<!-- Put Div row in every first of three -->
			<?php if($counter % 4 ==  0): ?>
				<div class="row">
			<?php endif; ?>

			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			    <div class="hovereffect">
			        <img class="img-responsive" src="<?php echo $cuisine->thumb ?>" alt="">
			            <div class="overlay">
			                <h2><?php echo "$cuisine->name"; ?></h2>
							<p> 
								<a href="<?php echo base_url('restaurant/cuisine/'.$cuisine->name) ?>">View Restaurants</a>
							</p> 
			            </div>
			    </div>
			</div>

			<a href="<?php echo base_url('user/send_mail') ?>" class="btn btn-default">Send mail</a>

			
			<!-- Put Div close in every three of three  -->
			<?php if($counter % 4 ==  3): ?>
				</div>
			<?php endif; $counter++;?>

		<?php endforeach;?>
	</div>
</div>
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