
<div class="container">
    <div class="row" style="padding:3% 0;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
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

            <?php $i = 1; ?>

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
                            
                           
                            <a onclick='add_cart(<?php echo $id ?>,<?php echo $data; ?>)' style="cursor: pointer">&plus;</a>
                            <a onclick='minus_cart(<?php echo $id ?>,<?php echo $data; ?>)' style="cursor: pointer">&minus;</a>
                            </td>
                    </tr>

            <?php $i++; ?>
            <?php endforeach; ?>

            <tr>
                    <td colspan="4"> </td>
                    <td style="text-align:right"><strong>Total</strong></td>
                    <td style="text-align:right" id="total"><?php echo NZD($this->cart->total()); ?></td>
                    <td></td>
            </tr>

            </table>

            <!-- Get URL -->
            <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
    
            <!-- <?php echo form_submit('', 'Update your Cart', array('class' => "btn btn-primary")); ?> -->
            
            <?php if($this->cart->total_items()>0): ?>
            <a href="<?php echo base_url('cart/checkout'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Checkout</button></a>
            <?php endif; ?>
            
            <?php echo form_close() ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


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

    function add_cart(id,dish){

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



