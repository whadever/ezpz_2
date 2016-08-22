<!-- Modal -->
<div class="modal fade" id="checkCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      	<div class="modal-body">
	
			<p>Are YOU SURE YOU WANT TO DELETE CART</p>

			<a href="<?php echo base_url() ?>cart/destory">Yes</a>
			<a href="<?php echo base_url() ?>cart/destory/no">No</a>

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