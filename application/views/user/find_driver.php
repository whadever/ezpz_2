<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body>
	<div class="container-fluid">
		<div class="row">
			<div id="driver">
				<h2>Waiting For Driver
          <?php echo $order_id; ?>  
        </h2>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

function auto_load(){
        $.ajax({
          url: "<?php echo base_url('order/tracking/'.$order_id) ?>",
          type: 'GET',
          cache: false,
          success: function(result){
          	if(result == 1)
          	{
             	window.location.replace("<?php echo base_url('order/driver_found'); ?>");
          	}else{
          		setTimeout(auto_load,3000);
          	}
            
          } 
        });
}
 
</script>

<script>
		

$(document).ready(function(){

	auto_load();

});


</script>