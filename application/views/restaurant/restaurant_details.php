<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 restaurant-detail">
					
				<h2 style="display:inline;"><?php echo $restaurant->name.' ' ?></h2>
				<span class="rating">
					<h3 class="label label-info" style="font-size:12px;display:inline;line-height:15px;">3 / 5</h3>
					<p style="font-size:10px;display:inline;margin-left:2px;">100 votes</p>
				</span>
				
				<?php if($restaurant_time): ?>
				<p><?php echo 'Open Today'.' '.date('H:i',strtotime($restaurant_time->opentime)).' - '.date('H:i',strtotime($restaurant_time->closetime)) ?></p>
				<?php else: ?>
					<p>Closed Today</p>
				<?php endif; ?>
				<p><?php echo $restaurant->telephone.' ' ?></p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		  <ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
		    <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
		    <li><a data-toggle="tab" href="#menu2">Photos</a></li>
		  </ul>
		 <?php if($restaurant_time): ?>
		  <?php if(date('H:i') < date('H:i',strtotime($restaurant_time->opentime))){
		  		$disabled = 'disabled';?>
		  		
				<?php }else{
		  		$disabled = '';
		  	}?>
		  <?php else: ?>
				<?php $disabled = 'disabled'; ?>
		  <?php endif ?>
		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">

		    	<?php foreach($dishes as $dish): ?>
		    	<?php echo form_open('cart/add') ?>
		    	<div class="row">
		    		<div class="col-xs-2 hidden-xs" style="margin-bottom:5px; ">
		    			<img class="img-responsive" width="60" src="<?php echo base_url().$dish->photo ?>" alt="">
		    		</div>
		    		<div class="col-xs-10" style="padding-left:0px">
		    			<div class="panel-body"><h3 style="display:inline;" ><?php echo $dish->name ?></h3><input type="number" name="quantity" class="food-number pull-right" required placeholder=" 0" <?php echo $disabled ?> >
					      <p><?php echo $dish->description ?></p>
					      <p>Price : $<?php echo $dish->price ?></p>
					    </div>
					    
					    <!-- Get Dishes Ids -->
					    <input type="hidden" value="<?php echo $dish->id ?>" name="dish_id">
					    <input type="hidden" value="<?php echo $dish->restaurant_id ?>" name="resto_id">
					    
					    <!-- Get URL -->
					    <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
		    			
		    			<input type="submit" value="Add to Cart" class="btn btn-primary pull-right">
		    		</div>
		    	</div>
		    	<?php echo form_close() ?>					    	
		    	<?php endforeach; ?>
		    </div>

		    <div id="menu1" class="tab-pane fade">
		      	<h3>Reviews</h3>

				<?php if($this->session->userdata('isLogged')==FALSE): 	 ?>
					<a href="#" data-toggle="modal" data-target="#loginModal">Please Login</a>
					<?php 	$this->load->view('login/login') ?>
				<?php else: ?>
				<?php echo form_open('restaurant/post_comment') ?>
				    <div class="input-group">
	  					<textarea class="form-control" name="review" aria-describedby="basic-addon2">
	  					</textarea>
	  					<input type="hidden" name="restaurant_id" value="<?php echo $restaurant->id ?>">
	  					<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>">
	  					<span class="input-group-addon" id="basic-addon2"><input type="submit" name="post" value="Post Comment"></span>

					</div>
				</form>

				<?php endif; ?>
				
		      	<div id="review">
		      	<div class="panel panel-default panel-horizontal">
		      		<div class="panel-heading">
		      			<div class="image-review" style="background-image:url(<?php echo base_url()."/images/emily.jpg" ?>);">
		      			</div>
		      			<h3 class="panel-title">Felita Setiawan</h3>
		      		</div>
		      		<div class="panel-body">
		      			IT FEELS SO GOOD Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magnam quisquam ea sint doloribus, consequuntur deleniti libero illo. Cupiditate laborum, quae animi amet perferendis dicta delectus itaque aperiam iure ratione.
		      		</div>	
		      	</div>
		    </div>
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3>Photos</h3>
		      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		    </div>
		  </div>
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


