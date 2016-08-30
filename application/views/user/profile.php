
<div class="container">
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-8">
			<div class="row">
			<?php foreach($order_history as $history) : ?>
				
				<table class="table table-bordered" id="orders">
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
								<a href="<?php echo base_url('user/order_detail/'.$history->code) ?>">
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
		</div>
		<div class="col-lg-2">
			
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
