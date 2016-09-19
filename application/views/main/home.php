<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
	.image-full{
		height:500px;
	}
</style>


<!--Full Div End, What you can do div-->
<div class="row">
	<div class="container whatdo" id="do-row">
		<div class="row text-center">
		<h2 style="margin-bottom:25px;">What You Can Do</h2>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel text-center food-panel">
					<div class="panel-body">
						<div class="row panel-text">
							<h4>Get Your Food Delivered</h4>
							<p>Be a member of EZPZ and get food delivered to your reach fast, and easy with reasonable price.</p>
						</div>
						<div class="row panel-button">
							<a href="#" data-toggle="modal" data-target="#loginModal" class="btn do-button"><p>Order Now</p></a>
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-sm-4">
				<div class="panel text-center food-panel">
					<div class="panel-body">
						<div class="row panel-text">
							<h4>Be Our Freelancer</h4>
							<p>Work as a freelancer with EZPZ. Free working time, profit, easy.</p>
						</div>
						<div class="row panel-button">
							<a class="btn do-button" href="<?php echo base_url('login/register/driver') ?>"><p>Sign Up as Freelancer</p></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel text-center food-panel">
					<div class="panel-body">
						<div class="row panel-text">
							<h4>Be Our Partner Restaurant</h4>
							<p>Team up with us and get more profit and reach more customers.</p>
						</div>
						<div class="row panel-button">
							<a class="btn do-button" href="<?php echo base_url('login/register/client') ?>"><p>Be a Partner</p></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--What you can do div end, cuisine selection start-->
<div class="row food" id="food-row">
	<div class="container">
		<div class="row text-center">
			<h2 style="margin-bottom:25px;">Cuisine Selections</h2>
		</div>
	<?php 

	$counter=0;
	//Get Restaurant
	foreach($cuisines as $cuisine): ?>
		<?php 
		//Put Div row in every first of three
		if($counter % 4 ==  0): ?>
			<div class="row">
		<?php endif; ?>

			<div class="col-lg-3 col-md-6 col-xs-6">
			<a href="<?php echo base_url('restaurant/cuisine/'.$cuisine->name) ?>">
			    <div class="hovereffect" style="cursor: pointer">
			        <img class="img-responsive" src="<?php echo $cuisine->thumb ?>" alt="">
			            <div class="overlay">
			                <h2><?php echo "$cuisine->name"; ?></h2>
							<p> 
								View Restaurants
							</p> 
			            </div>
			    </div>
			</a>
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


