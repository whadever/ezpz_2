
<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<?php foreach($order_history as $history) : ?>
				<pre>
					<?php print_r($history) ?>
				</pre>
				<table class="table" id="orders">
					<thead>
						<tr>
							<th>
								Order Number	
							</th>
							<th>
								Restaurant
							</th>
							<th>
								Driver Name
							</th>
							<th>
								Address
							</th>
							<th>
								Date
							</th>
						</tr>	
					</thead>	
					<tbody>
						<tr>
							<td>
								<a href="#" data-toggle="modal" data-target="#order_details" data-code="<?php echo $history->code ?>">
									<?php echo $history->code ?>
								</a>
							</td>
							<td>
								<?php echo $history->name ?>
							</td>
							<td>
								<?php echo $history->firstname . ' ' . $history->lastname?>
							</td>
							<td>
								<?php echo $history->address ?>
							</td>
							<td>
								<?php echo $history->date ?>
							</td>
						</tr>
					</tbody>
				</table>

				
			<?php endforeach; ?>

		</div>
		<div class="col-lg-2">
			
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <input type="hidden" name="code" id="code">
      <input type="hidden" name="as" id="as">
		<?php echo "<script>document.writeln($(e.relatedTarget).data('code'))</script>" ?>
      	<div class="modal-body">
			
			<table class="table">
				
			</table>
			

    	</div>
    	
    </div>
  </div>
</div>



<!-- <div class="container-fluid" style="padding-top:20px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<div class="row">
				<div class="profile-picture" style="background-image : url(<?php echo base_url().$user->photo ?>); " id="edit-prof-pic">
				</div>
			</div>
			<div class="row">
				<p id="profile-name"><?php echo $user->username ?></p>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

	<div class="col-md-6"></div>
</div>

<div class="row">
	<iframe width="600" height="450" src="https://www.google.com/maps/embed/v1/place?q=<?php echo urlencode($user->address) ?> 
      &zoom=17
      &key=AIzaSyBcbISjaXDKeBwFCoxybJ_4cbvJs1SOi4w">
  </iframe>
</div> -->

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
	$(document).ready(function() {
   	 $('#orders').DataTable();
	} );
</script>

<script>
//triggered when modal is about to be shown
$('#order_details').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var code = $(e.relatedTarget).data('code');
     
     //populate the textbox
     $(e.currentTarget).find('input[name="code"]').val(code);

     test = code.replace(/,/g,'');
});
</script>
