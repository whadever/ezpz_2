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

                    <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                    <tr>
                            <td><a onclick="return confirm('Are you sure?')" href="<?php echo site_url('cart/remove/'.$items['rowid'])?>">&times;</a></td>
                            <td><?php echo $i ?></td>
                            <td><?php echo $items['name']; ?> </td>
                            <td><?php echo form_input(array('name' => 'quantity[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                            <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td>
                            <?php $data = json_encode($items) ?>
                            <a onclick="add_cart(this,<?php echo $data; ?>)">&plus;</a>
                            <a onclick="minus_cart(this,<?php echo $data; ?>)">&minus;</a>
                            </td>
                    </tr>

            <?php $i++; ?>
            <?php endforeach; ?>

            <tr>
                    <td colspan="4"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

            </table>

            <!-- Get URL -->
                    <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
            
                    <!-- <?php echo form_submit('', 'Update your Cart', array('class' => "btn btn-primary")); ?> -->
                    <a href="<?php echo base_url('cart/checkout'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Checkout</button></a>
                    <?php echo form_close() ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<script>
function add_cart(el,dish){



        dish.quantity = 1;

        dish.resto_id = <?php echo $restaurant->id ?>;

        $.ajax({
          url: "<?php echo base_url('cart/add') ?>",
          data: dish,
          type: 'POST',
          success: function(result){
                
            
          } 
        });
}

function minus_cart(el,dish){



        dish.quantity = -1;

        dish.resto_id = <?php echo $restaurant->id ?>;

        $.ajax({
        
          url: "<?php echo base_url('cart/add') ?>",
          data: dish,
          type: 'POST',
          success: function(result){
                
            
          } 
        });
}

$(window).load(function() {

});
</script>
