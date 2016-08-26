<?php if($cartDestroy == TRUE): ?>
	
<script>
	 $(window).load(function(){

        $('#checkCart').modal({
		  backdrop: 'static',
		  keyboard: false
		});
		
        $('#checkCart').modal('show');
    })
</script>	

<?php endif; ?>
	
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 restaurant-detail">
						
					<h2 style="display:inline;"><?php echo $restaurant->name.' ' ?></h2>
					
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
	<div class="row">
		<div class="container" style="margin-bottom:20px;">
			<div class="row" style="padding-right:">
				<div class="col-md-8 col-xs-12">
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
					    <li><a data-toggle="tab" href="#review">Reviews</a></li>
					  </ul>
					  <?php if($restaurant_time): ?>
					  <?php if(date('H:i') < date('H:i',strtotime($restaurant_time->opentime)) || 
							date('H:i') > date('H:i',strtotime($restaurant_time->closetime))){
					  		$disabled = 'disabled';?>
					  		
							<?php }else{
					  		$disabled = '';
					  	}?>
					  <?php else: ?>
							<?php $disabled = 'disabled'; ?>
					  <?php endif ?>
				  
					<div class="tab-content">
				    
				    <div id="home" class="tab-pane fade in active" style="padding:15px;">
				    	<?php foreach($dishes as $dish): ?>
				    	<?php echo form_open('cart/add') ?>
				    	<div class="row" style="padding-bottom:15px; padding-top:10px; border-bottom:1px solid #ddd;">
				    		<div class="col-sm-2 hidden-xs" style="padding-right:0;">
				    			<div class="menu-image" style="border-radius:20px; width:100px; height:100px; background-size:cover; background-position:center center; margin:auto; background-image:url(<?php echo base_url().$dish->photo ?>);">
				    				
				    			</div>	
				    			<!-- <img class="img-responsive" src="<?php echo base_url().$dish->photo ?>" alt=""> -->
				    		</div>
				    		<div class="col-xs-12 col-sm-10" style="padding-right:20px;">
				    			<!-- <div class="panel-body"><h3 style="display:inline;" ><?php echo $dish->name ?></h3><input type="number" name="quantity" class="food-number pull-right" required placeholder=" 0" <?php echo $disabled ?> > -->
				    			  <h3 style="display:inline;" ><?php echo $dish->name ?></h3>
				    			  <?php $data = json_encode($dish) ?>
				    			  <a  class="pull-right" id="plus" onclick='add_cart(this,<?php echo $dish->id ?>,<?php echo $data; ?>)'><span class="glyphicon glyphicon-plus"></span></a>

				    			  <div style="word-wrap: break-word; width: 80%">
				    			  	<p><?php echo $dish->description ?></p>
				    			  </div>
							      
							      <p style="margin-bottom:5px;">Price : <?php echo NZD($dish->price) ?></p>
							    <!-- </div> -->
							    
							    <!-- Get Dishes Ids -->
							    <input type="hidden" value="<?php echo $dish->id ?>" name="dish_id">
							    <input type="hidden" value="<?php echo $dish->restaurant_id ?>" name="resto_id">
							    
							    <!-- Get URL -->
							    <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
				    			
				    			<!-- <input type="submit" value="Add to Cart" class="btn btn-primary pull-right" onClick="checkCart()"> -->

				    		</div>
				    	</div>
				    	<?php echo form_close() ?>					    	
				    	<?php endforeach; ?>
				    </div><!--End of Menu tab-->

				    <!--Review Tab-->
				    <div id="review" class="tab-pane fade">
				      	<h3>Reviews</h3>

						<?php if($this->session->userdata('isLogged')==FALSE): 	 ?>
							<a href="#" data-toggle="modal" data-target="#loginModal">Please Login</a>
							
						<?php else: ?>
						<?php echo form_open('restaurant/post_comment',array('id' => 'comment')) ?>
						    <div class="input-group">
			  					<textarea class="form-control" rows="1" name="review" aria-describedby="basic-addon2"></textarea></span>
			  					<input type="hidden" name="restaurant_id" value="<?php echo $restaurant->id ?>"/>
			  					<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>"/>
			  					<input type="hidden" value="<?php echo uri_string(); ?>" name="url"/>
			  					<span class="input-group-btn">
		                    		<button class="btn btn-default" type="submit" name="post" onclick="submit()" style="height:53px;">
		                		Post</button>
		                		
							</div>
						<?php echo form_close(); ?>
						<?php endif; ?>
					
				      	<?php foreach ($comments as $comment): ?>
				      		<div class="panel panel-default panel-horizontal">
					      		<div class="panel-heading text-center">
					      			<div class="profile-picture" style="background-image:url(<?php echo base_url().$comment->photo ?>);">
					      			</div>
					      			<h3 class="panel-title"><?php echo $comment->username ?></h3>
					      		</div>
					      		<div class="panel-body">
					      			<?php echo $comment->review ?>
					      		</div>
					      	</div>
				      	<?php endforeach ?>
				    </div><!--End of Review Panel-->
				    </div><!--End of Tabcontent-->	
				  </div>
				  <div class="col-md-4 col-xs-12" style="border:1px #ddd solid;padding: 20px 15px 20px 15px;">
			
				  		<h3 class="text-center">Order Details</h3>
				  		<div class="wrap">
				  			
							<?php echo form_open('cart/update'); ?>
							      
							       

							        <table cellpadding="6" cellspacing="1" border="0" class="table" >

							        <tr>
							                <th>&nbsp;</th>
							                <th>No.</th>
							                <th>Item Name</th>
							                <th>Qty</th>
							                <th style="text-align:right">Item Price</th>
							                <th style="text-align:right">Sub-Total</th>
							                <th></th>
							        </tr>
									<tbody id="items">
							        <?php $i = 1; ?>
									
							        <?php foreach ($this->cart->contents() as $items): ?>
										<?php $id = $items['id'] ?>
										<?php $data = json_encode($items) ?>
							                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
									
							                <tr id="cart_<?php echo $id ?>">
							                        <td><a onclick='remove_item(<?php echo $data ?>)' style="cursor: pointer">&times;</a></td>
							                        <td id="no_<?php echo $id ?>"><?php echo $i ?></td>
							                        <td><?php echo $items['name']; ?> </td>
							                        
							                        <td><input type="text" id="quantity_<?php echo $id ?>" name="quantity[]" disabled="disabled" value="<?php echo $items['qty'] ?>" maxlength="3" size="3"></td>
							                        <td id="price_<?php echo $id ?>" ><?php echo NZD($items['price']); ?></td>
							                        <td id="subtotal_<?php echo $id ?>" ><?php echo NZD($items['subtotal']); ?></td>
							                        <td>
							                        
							                       
							                        <a onclick='add_cart1(<?php echo $items['id'] ?>,<?php echo $data; ?>)' style="cursor: pointer">&plus;</a>
							                        <a onclick='minus_cart(<?php echo $items['id'] ?>,<?php echo $data; ?>)' style="cursor: pointer">&minus;</a>
							                        </td>
							                </tr>

							        <?php $i++; ?>
							        <?php endforeach; ?>
									</tbody>
							        <tr>
							                <td colspan="4"> </td>
							                <td class="right"><strong>Total</strong></td>
							                <td class="right" id="total">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
							        </tr>

							        </table>

							        <!-- Get URL -->
							                <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
							        
							                
							                <a href="<?php echo base_url('cart/checkout'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Checkout</button></a>
							                <?php echo form_close() ?>


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

        <script>

        function remove_item(dish){
        	
        	var result = confirm('are you sure ?');
        	if(result){
        		$.ajax({
                  url: "<?php echo base_url('cart/remove')?>",
                  data: dish,
                  type: 'POST',
                  success: function(result){
                  
                        
                    location.reload();
                  } 
                });
        	}
        }

        function add_cart1(id,dish){

        		quantity = $('#quantity_'+id).val();
			
				quantity = quantity.replace(/,/g,'');

				var subtotal = $('#subtotal_'+id).html();
				subtotal = subtotal.replace('$','','');
				subtotal = subtotal.replace(/,/g,'');

				price = $('#price_'+id).html();
				price = price.replace('$','','');
				price = price.replace(/,/g,'');

				var total = $('#total').html();
				total = total.replace('$','','');
				total = total.replace(/,/g,'');

				total = +Number(total) - +Number(subtotal);

				quantity = +quantity + +1;

				subtotal = +Number(price) * (quantity);

				total = subtotal + total;

				dish.quantity = quantity;

        
                $.ajax({
                  url: "<?php echo base_url('cart/update') ?>",
                  data: dish,
                  type: 'POST',
                  success: function(result){

                        
                    $('#quantity_'+id).val(quantity);
          		
          		
	          		total_val = Number(subtotal).toFixed(2).toLocaleString('en');
	          		total = Number(total).toFixed(2).toLocaleString('en');
					$('#subtotal_'+id).empty();
					$('#subtotal_'+id).append('$ '+total_val);

					$('#total').empty();
					$('#total').append('$ '+total);
                  } 
                });
        }

        function minus_cart(id,dish){
        		quantity = $('#quantity_'+id).val();
			
				quantity = quantity.replace(/,/g,'');

				if(quantity == 0){
					
					location.reload();
					return false;
				}

				var subtotal = $('#subtotal_'+id).html();
				subtotal = subtotal.replace('$','','');
				subtotal = subtotal.replace(/,/g,'');

				price = $('#price_'+id).html();
				price = price.replace('$','','');
				price = price.replace(/,/g,'');

				var total = $('#total').html();
				total = total.replace('$','','');
				total = total.replace(/,/g,'');

				total = +Number(total) - +Number(subtotal);

				quantity = +quantity - +1;

				subtotal = +Number(price) * (quantity);

				total = subtotal + total;

				dish.quantity = quantity;


        		

                $.ajax({
                
                  url: "<?php echo base_url('cart/update') ?>",
                  data: dish,
                  type: 'POST',
                  success: function(result){
                     $('#quantity_'+id).val(quantity);
          		
          		
	          		total_val = Number(subtotal).toFixed(2).toLocaleString('en');
	          		total = Number(total).toFixed(2).toLocaleString('en');
					$('#subtotal_'+id).empty();
					$('#subtotal_'+id).append('$ '+total_val);

					$('#total').empty();
					$('#total').append('$ '+total);
                    
                  } 
                });
        }

        $(window).load(function() {
      
        });
        </script>

<script>
var number = <?php echo count($this->cart->contents()) ?>;
	function add_cart(el,id,dish){
		//alert('asd');
		
		var quantity = 0;
		var price = 0;
		

		if($('#quantity_'+id).val()){
			quantity = $('#quantity_'+id).val();
			
			quantity = quantity.replace(/,/g,'');

			var subtotal = $('#subtotal_'+id).html();
			subtotal = subtotal.replace('$','','');
			subtotal = subtotal.replace(/,/g,'');

			price = $('#price_'+id).html();
			price = price.replace('$','','');
			price = price.replace(/,/g,'');

			var total = $('#total').html();
			total = total.replace('$','','');
			total = total.replace(/,/g,'');

			total = +Number(total) - +Number(subtotal);

			quantity = +quantity + +1;

			subtotal = +Number(price) * (quantity);

			total = subtotal + total;
      	
          	
		}
		else if(number == 0){
			var total = $('#total').html();
			total = total.replace('$','','');
			total = total.replace(/,/g,'');

			total = +Number(dish.price);
		}

		else if(!$('#quantity_'+id).val() && number > 0){
			var total = $('#total').html();
			total = total.replace('$','','');
			total = total.replace(/,/g,'');

			total = +Number(total) + +Number(dish.price);
		}

		


		dish.quantity = 1;

		dish.resto_id = <?php echo $restaurant->id ?>;
	
		$.ajax({
          url: "<?php echo base_url('cart/add') ?>",
          data: dish,
          type: 'POST',
          success: function(result){
          	if(quantity != 0){
          		
          		$('#quantity_'+id).val(quantity);
          		
          		
          		total_val = Number(subtotal).toFixed(2).toLocaleString('en');
          		total = Number(total).toFixed(2).toLocaleString('en');
				$('#subtotal_'+id).empty();
				$('#subtotal_'+id).append('$ '+total_val);

				$('#total').empty();
				$('#total').append('$ '+total);

          	}
          	else if(quantity ==0){
          		// var price = Number(dish.price).toFixed(2);
          		// number = +number + +1;
          		// quantity = 1;
          		// $('#items').append("<tr id='cart_'"+id+"><td><a onclick='return confirm("+"Are you sure?"+")' href='<?php echo base_url() ?>"+"cart/remove/"+result+"'>&times;</a></td><td id='no_"+id+"'>"+number+"</td><td>"+dish.name+" </td><td><input type='text' id='quantity_"+id+"' disabled='disabled' name='quantity[]' value='"+quantity+"' maxlength='3' size='5'></td><td id='price_"+id+"' style='text-align:right'>"+"$ "+price+"</td><td id='subtotal_"+id+"' style='text-align:right'>"+"$ "+price+"</td><td><a onclick='add_cart1("+id+","+dish+")'>&plus;</a><a onclick='minus_cart("+id+","+dish+")'>&minus;</a></td></tr>")
          		
    //       		total = Number(total).toFixed(2).toLocaleString('en');
    //       		$('#total').empty();
				// $('#total').append('$ '+total);
				$(el).click(function() { return false; });
                location.reload();
          	}
          	
      
          },
          error: function(){
          	alert('please login to place an order');
          }
         
        });
	}

	$(window).load(function() {
      
	});
</script>

<script>

    function submit(){

        $("#comment").submit();
	}

</script>


