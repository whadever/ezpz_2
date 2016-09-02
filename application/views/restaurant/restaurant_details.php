<style>
	h2{
		margin: 20px 0;
		padding: 0;
	}

	p{
		margin: 10px 0px;
		padding: 0;
	}
</style>

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
					
					<p><?php echo $restaurant->address ?></p>

					<?php if($restaurant_time): ?>
					<p style="margin: 10px 0;"><?php echo 'Open Today'.' '.date('H:i',strtotime($restaurant_time->opentime)).' - '.date('H:i',strtotime($restaurant_time->closetime)) ?></p>
					<?php else: ?>
						<p>Closed Today</p>
					<?php endif; ?>
					<p><a href="tel: <?php echo $restaurant->telephone ?>"><?php echo $restaurant->telephone ?></a></p>
				</div>
			</div>	
		</div>
		
	</div>
	<div class="row">
		<div class="container" style="margin-bottom:20px;">
			<div class="row">
				<div class="col-lg-8 col-xs-12" style="margin-bottom:20px;">
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
					    <li><a data-toggle="tab" href="#review">Reviews</a></li>
					  </ul>
					 
				  
					<div class="tab-content" style="padding: 10px 20px">
				    
				    <div id="home" class="tab-pane fade in active" style="padding:0px 20px;">
				    	<?php $flag = 1; ?>
				    	<?php foreach($dishes as $dish): ?>
				    	<?php if($flag == count($dishes)){

				    			$border = '';

				    		}else{

				    			$border = 'border-bottom:1px solid #2C3E50;';

			    			}  ?>
				    	<?php echo form_open('cart/add') ?>
				    	<div class="row" style="padding-bottom:15px; padding-top:15px; <?php echo $border ?> ">
				    		<div class="col-sm-2 hidden-xs" style="padding-right:0;">
				    			<div class="menu-image" style="border-radius:20px; width:100px; height:100px; background-size:cover; background-position:center center; margin:auto; background-image:url(<?php echo base_url().$dish->photo ?>);">
				    				
				    			</div>	
				    			<!-- <img class="img-responsive" src="<?php echo base_url().$dish->photo ?>" alt=""> -->
				    		</div>
				    		<div class="col-xs-12 col-sm-10" style="padding-right:20px;">
				    			<!-- <div class="panel-body"><h3 style="display:inline;" ><?php echo $dish->name ?></h3><input type="number" name="quantity" class="food-number pull-right" required placeholder=" 0" <?php echo $disabled ?> > -->
				    			  <h3 style="display:inline;" ><?php echo $dish->name ?></h3>
				    			  <?php $data = json_encode($dish) ?>

								 <?php if($restaurant_time): ?>
								  <?php if(date('H:i') < date('H:i',strtotime($restaurant_time->opentime)) || 
										date('H:i') > date('H:i',strtotime($restaurant_time->closetime))){
								  		$closed = 'restaurant_still_closed()' ?>
								  		
										<?php }else{
								  		$closed = 'add_cart(this,'.$dish->id .','.$data.')';
								  	}?>
								  <?php else: ?>
									<?php $closed = 'restaurant_closed()' ?>
								  <?php endif ?>
								
							
				    			  <a  class="pull-right" id="plus" onclick='<?php echo $closed ?>'><span class="glyphicon glyphicon-plus"></span></a>

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
				    	<?php $flag ++; ?>
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
				  <div class="col-lg-4 col-xs-12">
					<div style="border:1px solid #2C3E50;">
				  		<h3 class="text-center">Order Details</h3>
				  		<div class="wrap" style="padding-bottom:10px">
				  			
							<?php echo form_open('cart/update'); ?>
							      
							        <table cellpadding="2" cellspacing="0" border="0" class="table" >

							        <tr>
							                <th>&nbsp;</th>
							                <th style="padding:8px 1px">No.</th>
							                <th>Item Name</th>
							                <th>Qty</th>
							                <th style="text-align:right">Item Price</th>
							                <th style="text-align:right">Sub-Total</th>
							                <th>&nbsp;</th>
							        </tr>
									<tbody id="items">
							        <?php $i = 1; ?>
							        <?php if (count($this->cart->contents()) == 0): ?>
							        	<tr>
							        		<td colspan="7" class="text-center">You haven't place an order yet</td>
							        	</tr>
							        <?php endif ?>
									
							        <?php foreach ($this->cart->contents() as $items): ?>
										<?php $id = $items['id'] ?>
										<?php $data = json_encode($items) ?>
							                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
									
							                <tr id="cart_<?php echo $id ?>">
							                        <td><a onclick='remove_item(<?php echo $data ?>)' style="cursor: pointer">&times;</a></td>
							                        <td id="no_<?php echo $id ?>"><?php echo $i ?></td>
							                        <td><?php echo $items['name']; ?> </td>
							                        
							                        <td><input type="text" id="quantity_<?php echo $id ?>" name="quantity[]" disabled="disabled" value="<?php echo $items['qty'] ?>" maxlength="3" size="3" style="background:transparent; border:none"></td>
							                        <td id="price_<?php echo $id ?>" style ="min-width:74px; text-align:right"><?php echo NZD($items['price']); ?></td>
							                        <td id="subtotal_<?php echo $id ?>" style="min-width:74px; text-align: right" ><?php echo NZD($items['subtotal']); ?></td>
							                        <td>
							                        
							                       
							                        <a onclick='add_cart1(<?php echo $items['id'] ?>,<?php echo $data; ?>)' style="cursor: pointer">&plus;</a>
							                        <a onclick='minus_cart(<?php echo $items['id'] ?>,<?php echo $data; ?>)' style="cursor: pointer">&minus;</a>
							                        </td>
							                </tr>

							        <?php $i++; ?>
							        <?php endforeach; ?>
									</tbody>
							        <tr>
							                <td colspan="4"></td>
							                <td style="text-align:right"><strong>Total</strong></td>
							                <td style="text-align:right" id="total">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
							                <td></td>
							        </tr>

							        </table>

							        <!-- Get URL -->
							                <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
							        
							                <?php if($this->cart->total_items()>0): ?>
							                <a href="<?php echo base_url('cart/checkout'); ?>" style="margin-left:10px;"><button type="button" class="btn btn-primary" value="Check Out">Checkout</button></a>
							            	<?php endif; ?>

							                <?php echo form_close() ?>
							</div>

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
  
        	
        	swal({

        		 title: "Are you sure?",   
        		 text: "You will not be able to recover this imaginary file!",   
        		 type: "warning",   
        		 showCancelButton: true,   
        		 confirmButtonColor: "#DD6B55",   
        		 confirmButtonText: "Yes, delete it!",   
        		 closeOnConfirm: true,   
        		 closeOnCancel: false

        	},

        	function(isConfirm){
        		if(isConfirm){
	        		$.ajax({
	                  url: "<?php echo base_url('cart/remove')?>",
	                  data: dish,
	                  type: 'POST',
	                  success: function(result){
	                  	
	                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
	                    setTimeout(function(){ location.reload(); }, 1000);
	                    
	                  } 
	                });
        		}
	        }
        	);
        	
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

	function restaurant_still_closed(){
		alert('Restaurant is closed at the moment. Please come back later')
	}

	function restaurant_closed(){
		alert('Restaurant is closed today')
	}

    function submit(){

        $("#comment").submit();
	}

</script>


