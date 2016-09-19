<div class="container" style="padding-bottom:20px;padding-top:20px;">
<div class="row">
			<h2 style="margin-bottom:25px; margin-left:10px;">You have <?php echo count($orders) ?> requests</h2>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="form-group" style="margin-bottom: 20px">
			<label for="">Search :</label>
			<input type="text" class="form-control" id="filter" style="width: 25%">
		</div>
		<div class="table-responsive toggle-circle-filled" id="tableHome">
			<table class="table table-condensed" id="orders" data-filter="#filter" data-page-size="10">
					<thead>
						<?php if(count($orders) == 0): ?>
							<tr>
								<th style="text-align: center" colspan="6">No Order</td>
							</tr>
						
						<?php else: ?>
						<tr>
							<th data-toggle="true">
								Order ID
							</th>	
							<th data-hide="phone">
								Client's Name
							</th>
							<th data-hide="phone">
								Restaurant's Name
							</th>
							<th data-hide="phone">
								Address
							</th>
							<th>
								Earnings
							</th>
					
							<th>
								&nbsp;
							</th>
						</tr>
						<?php endif; ?>
					</thead>
					
					<tbody>
						<?php if(count($orders) == 0): ?>
							<tr>
								<td style="text-align: center" colspan="6">You have not receive any order yet</td>
							</tr>
						<?php endif; ?>
						<?php foreach($orders as $order): ?>
						<tr>
							<td>
								<?php echo '#'.$order->code  ?>
							</td>
							<td>
								
								<a href="" data-toggle="modal" data-target="#client_info" data-firstname="<?php echo $order->firstname?>" data-lastname="<?php echo $order->lastname ?>" data-email="<?php echo $order->email?>" data-telephone="<?php echo $order->telephone?>" ><?php echo $order->firstname . ' ' . $order->lastname?></a>
							</td>
							<td>
								<?php echo $order->restaurant  ?>
							</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#maps" data-address="<?php echo urlencode($order->address) ?>"><?php echo wordlimiter($order->address,5)  ?></a>
							</td>
							<td>
								<?php echo NZD($order->delivery_cost * 70 / 100 - ($order->delivery_cost * 70/100 * 20/100) )  ?>
							</td>
							<td>
								<a class="btn btn-primary" href="<?php echo base_url('driver/accept_order/'.$order->code) ?>" >Accept</a>
							</td>
							
							
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot class="hide-if-no-paging">
						<td colspan="6">
							<div class="pagination"></div>
						</td>
						
					</tfoot>
			</table>

		</div>
	</div>
	
		
</div>
</div>

<script>
	$(document).ready(function() {
   	 $('#orders').footable();
	} );
</script>

<!-- Modal Client Info  -->
<div id="client_info" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>

        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Client Information</h4>
      </div>
      <div class="modal-body">
          <strong>Client Name :</strong>
          <p id="name"></p>
          <strong>Client E-mail :</strong>
          <p id="email"></p>
          
          <p>
          	<a class="btn btn-primary" style="margin-right:10px;" id="call"><span class="fa fa-phone" style="margin-right:10px;"></span>Call Client</a>
			<a class="btn btn-primary" id="sms"><span class="fa fa-envelope" style="margin-right:10px;"></span>Text Client</a>
		  </p>
        
      
      </div>
      
    </div>
  </div>
</div><!-- Modal Driver Info end -->

<!-- Modal -->
<div class="modal fade" id="maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      	<div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" >&times;</button>
			
			<iframe id="map_location" style="width:100%; height:450px" >
			</iframe>
			

    	</div>
    	
    </div>
  </div>
</div>

<script>
//triggered when modal is about to be shown
$('#maps').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var address = $(e.relatedTarget).data('address');
     var frame = document.getElementsByTagName("iframe")[0];
     var att = document.createAttribute("src");
     att.value = "https://www.google.com/maps/embed/v1/place?q="+address+"&zoom=13&key=AIzaSyBcbISjaXDKeBwFCoxybJ_4cbvJs1SOi4w";
     frame.setAttributeNode(att)
     //populate the textbox

});
</script>

<script>
	//triggered when modal is about to be shown
	$('#client_info').on('show.bs.modal', function(e) {

	    //get data-id attribute of the clicked element
	    var name = $(e.relatedTarget).data('firstname') + ' ' + $(e.relatedTarget).data('lastname');
	    var email = $(e.relatedTarget).data('email');
	    var phone = $(e.relatedTarget).data('telephone');

	    $(e.currentTarget).find('p[id="name"]').empty();
	    $(e.currentTarget).find('p[id="email"]').empty();
	    $(e.currentTarget).find('a[id="call"]').attr('href', 'tel:'+phone+'' );
	    $(e.currentTarget).find('a[id="sms"]').attr('href', 'sms:'+phone+'' );
	    //populate the textbox
	    $(e.currentTarget).find('p[id="name"]').append(name);
	    $(e.currentTarget).find('p[id="email"]').append(email);

	});

</script>


