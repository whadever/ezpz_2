<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?> - EZPZ</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <META name="description" content="the best new zealand food delivery service.">
    <META name="keywords" content="food, delivery, new zealand, ezpz, etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">


    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Muli|Roboto|Dosis" rel="stylesheet">

    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.php" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
  	<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
  	<link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/themes/fontawesome-stars.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon.jpg">
    <link rel="stylesheet" href="<?php echo base_url() ?>sweetalert-master/dist/sweetalert.css">

    <!-- Begin Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url() ?>js/card.js"></script>
    <script src="<?php echo base_url(); ?>sweetalert-master/dist/sweetalert.min.js"></script>

    

    <!-- Include all compiled plugins (below), or include individual files as needed -->
	  <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>
  
    
</head>

<body>


  <?php 
           $hex = str_replace("#", "", $configuration->primary_color);

           if(strlen($hex) == 3) {
              $r = hexdec(substr($hex,0,1).substr($hex,0,1));
              $g = hexdec(substr($hex,1,1).substr($hex,1,1));
              $b = hexdec(substr($hex,2,1).substr($hex,2,1));
           } else {
              $r = hexdec(substr($hex,0,2));
              $g = hexdec(substr($hex,2,2));
              $b = hexdec(substr($hex,4,2));
           }
           $rgb = array($r, $g, $b);
       ?>

  <header>
  <!--NavBar-->
      <div class="container-fluid">
	          <nav class="navbar navbar-default navbar-fixed-top" id="navbar" style="background-color: rgba(<?php echo $r ?>, <?php echo $g ?>, <?php echo $b ?>,0.5); border-color: transparent">
	            <div class="container">
	              <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span> 
	                </button>
	                <a class="navbar-brand" href="<?php echo base_url('main') ?>"><img src="<?php echo base_url('assets/logo.png') ?>" width="40" alt="" style="margin-top:-10px;"></a>
	              </div>

	              <div class="collapse navbar-collapse" id="myNavbar">

	                <ul class="nav navbar-nav navbar-left">
	                  <li><a href="<?php echo base_url('main') ?>" class="nav-link">Home</a></li>
	                  <li><a href="<?php echo base_url('main/about/') ?>" class="nav-link">About Us</a></li>
	                  <li><a href="<?php echo base_url('restaurant/cuisine/') ?>" class="nav-link">Restaurants</a></li>
	                  
	                  <li role="separator" class="divider" style="background-color: white; height: 1px"></li>
	                </ul>

	                <?php if($this->session->userdata("isLogged") == FALSE): ?>
	                <ul class="nav navbar-nav navbar-right">
	                  <li><a href="<?php echo base_url('login/register/user') ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	                  <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	                </ul>
	                <?php else: ?>
	                  <ul class="nav navbar-nav navbar-right">
	                    <li><a href="<?php echo base_url('cart/overview') ?>" ><?php echo $this->cart->total_items() ?>
	                      <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size:1.7em"></i>
	                    </a></li>
	                      <li><a href="<?php echo base_url(); echo $this->session->userdata('type');?>/profile/<?php echo $this->session->userdata('user_id') ?>"><?php echo $this->session->userdata('name') ?></a></li>
	                      <li><a href="<?php echo base_url('user/credits') ?>"><?php echo NZD($this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits')) ?></a></li>
	                      <li><a href="<?php echo base_url('login/signout') ?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
	                  </ul>
	                <?php endif; ?>
	               </div>
	            </div>
	          </nav>
      </div>
  </header>

<!--Full Div Image from div bg-->
<div class="container-fluid image-full" id="top" style="background-size: cover; background-position:center center ;background-repeat: no-repeat; ;background-image: url(<?php echo base_url().$background ?>);" data-stellar-background-ratio="0.5">
<div class="row" id="body" style="width:100%; height: 20px">&nbsp;</div>
</div>


<div id="main">
   <div class="container-fluid">
        <?php echo $body ?>
    </div>
    
</div>

<footer>
  <div class="container-fluid">
    <div class="row text-center" style="padding: 10px;">
      <img src="<?php echo base_url()?>images/logo.png" width="50px" style="margin-right:1em;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation.
    </div>
  </div>
</footer>


<!-- Modal -->
<?php if($this->session->userdata('isLogged') == false) $this->load->view('login/login'); ?>
<?php $this->load->view('restaurant/cart_check'); ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>

$(document).ready(function(){
  $(window).stellar(
    {
      verticalOffset:50,
      horizontalOffset:50,
    });
});

</script>
<script>

    var waypoint = new Waypoint({
      element: document.getElementById('body'),
      handler: function(direction) {
        
        document.getElementById('navbar').style.backgroundColor = 'rgba(<?php echo $r ?>, <?php echo $g ?>, <?php echo $b ?>,0.95)'; 
      }
    });

</script>

<script>
    var waypoint2 = new Waypoint({
      element: document.getElementById('top'),
      handler: function(direction) {
        
        document.getElementById('navbar').style.backgroundColor = "rgba(<?php echo $r ?>, <?php echo $g ?>, <?php echo $b ?>,0.5)";
     
       
      },
      offset: '-20%'
    });
</script></body>
</html>