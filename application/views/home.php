<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Full Div Image from div bg-->
<div class="container-fluid image-full">
	<div class="row">
		<form role="form" action="<?php echo base_url('restaurant/detail/') ?>" method="post" id="search">
		<div class="form-group center-block">
			<div class="input-group">
				<input type="text" autocomplete="off" name="restaurant-search" class="form-control" id="restaurant-search" placeholder="Search for restaurant address">
				<span class="input-group-btn">
 					<button class="btn btn-default" type="submit" name="search" onclick="submit()">
          		<span class="glyphicon glyphicon-search"></span></button>
          		</span>
			</div>
		</div>
	</form>
	</div>
</div>

<!--Full Div End, What you can do div-->
<div class="container-fluid col-sm-12 section-head" >
	<div class="container">
	<div class="row">
	<h3>What You Can Do</h3></div></div>
</div>
<div class="container-fluid" style="overflow:auto; padding-top:20px;">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-info text-center">
					<div class="panel-heading">
						Get Your Food Delivered
					</div>
					<div class="panel-body">
						<p>Be a member of EZPZ and get food delivered to your reach fast, and easy with reasonable price.</p>
						<p class="btn btn-info do-button">Order Now</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-warning text-center">
					<div class="panel-heading">
						Be Our Freelancer
					</div>
					<div class="panel-body">
						<p>Work as a freelancer with EZPZ. Free working time, profit, easy.</p>
						<a class="btn btn-warning do-button" href="<?php echo base_url('accounts/signup/driver') ?>">Sign Up as Freelancer</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-danger text-center">
					<div class="panel-heading">
						Be Our Partner Restaurant
					</div>
					<div class="panel-body">
						<p>Team up with us and get more profit and reach more customers.</p>
						<a class="btn btn-danger do-button" href="<?php echo base_url('accounts/signup/client') ?>">Be a Partner</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--What you can do div end, cuisine selection start-->
<div class="container-fluid col-sm-12 section-head">
	<div class="container">
	<div class="row">
	<h3>Cuisine Selections</h3></div></div>
</div>
<div class="container-fluid food">
	<div class="container">
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
			        <img class="img-responsive" src="http://placehold.it/350x250" alt="">
			            <div class="overlay">
			                <h2><?php echo $cuisine; ?></h2>
							<p> 
								<a href="<?php echo base_url('restaurant/cuisine/'.$cuisine) ?>">View Restaurants</a>
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

<?php foreach ($restaurants as $restaurant): ?>
	test[<?php echo $i ?>] = "<?php echo $restaurant['username'] ?>"
	<?php $i++; ?>
<?php endforeach; ?>

$("#restaurant-search").typeahead({

                        minLength: 0,
                        items: 9999,
                        source: test,   
                    });
</script>



<script>

function submit(){

	$("#search").submit() {
}

	

</script>


