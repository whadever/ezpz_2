<?php echo form_open(''); ?>

<div class="container" id="cart-info">
        
       <!--  <?php if($this->session->flashdata('success')): ?>
                
                <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success') ?>
                </div>
        

        <?php elseif($this->session->flashdata('failed')): ?>

                <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('failed') ?>
                </div>

        <?php endif; ?> -->

        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered">

        <tr>    
                <th>&nbsp;</th>
                <th>No.</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr>
                        <td><a onclick="return confirm('Are you sure?')" href="<?php echo site_url('cart/remove/'.$items['rowid']) ?>">&times;</a></td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $items['name']; ?> </td>
                        <td><?php echo $items['qty']; ?></td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

        <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>

        </table>
      
        <p>
       		<a href="<?php echo base_url('order/search_driver'); ?>">
                <button type="button" class="btn btn-primary btn-float">Find Driver</button>
            </a>     
        </p>
</div>