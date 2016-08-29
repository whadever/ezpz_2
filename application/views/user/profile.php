<div class="container-fluid" style="padding-top:20px;">
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
<div class="row text-center">
	<iframe width="600" height="450" src="//www.google.com/maps/embed/v1/place?q=<?php echo urlencode($user->address) ?>
      &zoom=17
      &key=AIzaSyBcbISjaXDKeBwFCoxybJ_4cbvJs1SOi4w">
  </iframe>
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

