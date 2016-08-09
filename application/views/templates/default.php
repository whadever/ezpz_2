<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?> - EZPZ</title>
    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
	<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">



    <!-- Begin Scripts -->
   
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/flat-ui.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-3.1.0.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>
    
    
    
</head>

<body>


<div class="cart">
	<a href="#"><?php echo $this->cart->total_items() ?><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size:1.7em"></i></a>
</div>


<?php echo $body ?>

	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>