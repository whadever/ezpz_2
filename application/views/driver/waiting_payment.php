<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>

.showbox {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 5%;
  margin-top:1em;
  margin-bottom:1em;
}

.loader {
  position: relative;
  margin: 0 auto;
  width: 100px;
}
.loader:before {
  content: '';
  display: block;
}

.circular {
  -webkit-animation: rotate 2s linear infinite;
          animation: rotate 2s linear infinite;
  height: 100%;
  -webkit-transform-origin: center center;
          transform-origin: center center;
  width: 100%;

  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}

.path {
  stroke-dasharray: 1, 200;
  stroke-dashoffset: 0;
  -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
          animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
  stroke-linecap: round;
}

@-webkit-keyframes rotate {
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes rotate {
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@-webkit-keyframes dash {
  0% {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -35px;
  }
  100% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -124px;
  }
}
@keyframes dash {
  0% {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -35px;
  }
  100% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -124px;
  }
}
@-webkit-keyframes color {
  100%,
  0% {
    stroke: #d62d20;
  }
  40% {
    stroke: #0057e7;
  }
  66% {
    stroke: #008744;
  }
  80%,
  90% {
    stroke: #ffa700;
  }
}
@keyframes color {
  100%,
  0% {
    stroke: #d62d20;
  }
  40% {
    stroke: #0057e7;
  }
  66% {
    stroke: #008744;
  }
  80%,
  90% {
    stroke: #ffa700;
  }
}
</style>

	<div class="container-fluid">
		<div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">

        <!-- Waiting For Driver Text -->
          <div id="driver">
            <h1 class="waiting" id="textWait" align="center">WAITING FOR RATING</h1>
          </div>

        <!-- Loading Div -->
         <div class="showbox" id="loading">
          <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
              <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="col-xs-3"></div>
		</div>
	</div>

  <div class="row">
    <div class="col-xs-1 col-md-2"></div>
    <div class="col-xs-10 col-md-8">
        <!-- Order Details -->
        <h2 class="roboto">Your Order Details</h2>
        <table class="table table-striped">
          <tr>
            <th>Order Number</th>
            <td>#<?php echo $order->code ?></td>
          </tr>
          <tr>
            <th>Order Items</th>
            <td><?php echo $order->total_qty ?></td>
          </tr>
          <tr>
            <th>Order Total</th>
            <td>$<?php echo $order->total_price ?></td>
          </tr>
          <tr>
            <th>Delivery Address</th>
            <td><?php echo $order->address ?></td>
          </tr>
        </table>
    </div>
    <div class="col-xs-1 col-md-2"></div>
  </div>
  <div class="row" style="margin-bottom: 20px">
    <div class="col-lg-2"></div>
      <div class="col-lg-8 text-center">
      
      </div>
    <div class="col-lg-2"></div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

  function auto_load(){
          $.ajax({
            url: "<?php echo base_url('driver/tracking/'.$order->code) ?>",
            type: 'GET',
            cache: false,
            success: function(result){

              if(result > 0)
              {
                
                $.ajax({
	            url: "<?php echo base_url('driver/finish_order/'.$order->code) ?>",
	            type: 'GET',
	            cache: false,
	            success: function(){
	            	window.location.assign("<?php echo base_url('driver') ?>");
	            	}
	            });
             
              }
                
              else{
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