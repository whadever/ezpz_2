<?php date_default_timezone_set('Asia/Jakarta'); ?>
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
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		  <ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
		    <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
		    <li><a data-toggle="tab" href="#menu2">Photos</a></li>
		  </ul>
		 
		  <?php if(date('H:i') < date('H:i',strtotime($restaurant->opentime))){
		  		$disabled = 'disabled';?>
		  		
				<?php }else{
		  		$disabled = '';
		  	}?>
		  
		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		    	<div class="row">
		    		<div class="col-xs-2 hidden-xs" style="margin-bottom:5px; ">
		    			<img class="img-responsive" src="http://placehold.it/250x220" alt="">
		    		</div>
		    		<div class="col-xs-10" style="padding-left:0px">
		    			<div class="panel-body"><h3 style="display:inline;" >Menu</h3><input type="number" name="" class="food-number pull-right" placeholder=" 0" <?php echo $disabled ?> >
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.AAAAAAAAAAAAAAAAAAAAAAA</p>
					      <p>Price : $9</p>
					    </div>
		    			<p class="btn btn-primary pull-right">Add to Cart</p>
		    		</div>
		    	</div>					    	
		    	<div class="row">
		    		<div class="col-xs-2 hidden-xs" style="margin-bottom:5px; ">
		    			<img class="img-responsive" src="http://placehold.it/250x220" alt="">
		    		</div>
		    		<div class="col-xs-10" style="padding-left:0px">
		    			<div class="panel-body"><h3 style="display:inline;" >Menu</h3><input type="number" name="" class="food-number pull-right" placeholder=" 0" <?php echo $disabled ?> >
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.AAAAAAAAAAAAAAAAAAAAAAA</p>
					      <p>Price : $9</p>
					    </div>
		    			<p class="btn btn-primary pull-right">Add to Cart</p>
		    		</div>
		    	</div>
		    </div>

		    <div id="menu1" class="tab-pane fade">
		      <h3>Reviews</h3>
		      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3>Photos</h3>
		      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		    </div>
		  </div>
		 </div>
	</div>
</div>

