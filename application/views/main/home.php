<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<!--Full Div End, What you can do div-->
<div class="container-fluid whatdo">
	<div class="container">
		<div class="row text-center">
		<h1 style="margin-bottom:25px;">What You Can Do</h1>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-info text-center">
					<div class="panel-body">
						Get Your Food Delivered
						<p>Be a member of EZPZ and get food delivered to your reach fast, and easy with reasonable price.</p>
						<p class="btn btn-info do-button">Order Now</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-info text-center">
					<div class="panel-body">
						Be Our Freelancer
						<p>Work as a freelancer with EZPZ. Free working time, profit, easy.</p>
						<a class="btn btn-info do-button" href="<?php echo base_url('login/register/driver') ?>">Sign Up as Freelancer</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-info text-center">
					<div class="panel-body">
						Be Our Partner Restaurant
						<p>Team up with us and get more profit and reach more customers.</p>
						<a class="btn btn-info do-button" href="<?php echo base_url('login/register/client') ?>">Be a Partner</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--What you can do div end, cuisine selection start-->
<div class="container-fluid food">
	<div class="container">
	<div class="row text-center">
	<h1 style="margin-bottom:25px;">Cuisine Selections</h1></div>
	<?php 

	$counter=0;
	//Get Restaurant
	foreach($cuisines as $cuisine): ?>
		<?php 
		//Put Div row in every first of three
		if($counter % 4 ==  0): ?>
			<div class="row">
		<?php endif; ?>

			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			    <div class="hovereffect">
			        <img class="img-responsive" src="images/cuisines/<?php echo $cuisine->photo ?>" alt="">
			            <div class="overlay">
			                <h2><?php echo "$cuisine->name"; ?></h2>
							<p> 
								<a href="<?php echo base_url('restaurant/cuisine/'.$cuisine->name) ?>">View Restaurants</a>
							</p> 
			            </div>
			    </div>
			</div>
		<?php
		//Put Div close in every three of three 
		if($counter % 4 ==  3): ?>
			</div>
		<?php endif; $counter++;?>
	<?php endforeach;?>
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


