<div class="container-fluid">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<?php echo $user->username ?>
		<div class="profile-picture" style="background-image : url(<?php echo base_url().$user->photo ?>); width: 500px; height:500px;"></div>
	</div>
	<div class="col-md-2"></div>
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