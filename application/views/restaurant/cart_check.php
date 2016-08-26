<!-- Modal -->
<div class="modal fade" id="checkCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


        <div class="modal-header heading"><h4>Confirm Empty Cart</h4></div>
      	<div class="modal-body">
        
      			<p>Your previous order will be cancelled if you make new order. Proceed?</p>


      			<a href="<?php echo base_url() ?>cart/destroy" class="btn btn-primary">Ok</a>
      			<a href="<?php echo base_url() ?>cart/destroy/no" class="btn btn-primary">Cancel</a>
      	</div>

      	<?php 
      		$this->session->set_flashdata('url', base_url(uri_string()));
      	?>
    	
    </div>
  </div>
</div>

<script>
	$('#checkCart').on('shown.bs.modal');
</script>