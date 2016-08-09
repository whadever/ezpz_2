<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<br><br><br><br><br>
<!-- Buttons for New Clients -->
<div class="container">
	<div class="row">

	<!-- Alert Messages -->
	<?php if($this->session->flashdata('error')): ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error') ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('success') ?>
		</div>
	<?php endif; ?>

		<div class="col-md-6">
			<a href="<?php echo base_url('admin/clients/new') ?>"><button class="btn btn-primary">New Client</button></a>
			<a href="<?php echo base_url('admin/users/user') ?>"><button class="btn btn-primary">View Users</button></a>
			<a href="<?php echo base_url('admin/users/driver') ?>"><button class="btn btn-primary">View Drivers</button></a>
			<a href="<?php echo base_url('admin/users/client') ?>"><button class="btn btn-primary">View Clients</button></a>
		</div>
	</div>
</div>