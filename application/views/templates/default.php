<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?> - EZPZ Delivery</title>

    <META name="description" content="the best new zealand food delivery service.">
    <META name="keywords" content="food, delivery, new zealand, ezpz, etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.php" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/footable.metro.min.css" type="text/css" rel="stylesheet">
  	<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
  	<link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/themes/bars-reversed.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon.jpg">
<!--     <link rel="stylesheet" href="<?php echo base_url() ?>datatables/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>sweetalert-master/dist/sweetalert.css">
    

    <!-- Begin Scripts -->
    <script src="<?php echo base_url() ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url() ?>js/iscroll.js"></script>
    <script src="<?php echo base_url() ?>js/card.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
	  <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url() ?>js/footable.js"></script>
    <script src="<?php echo base_url() ?>js/footable.filter.js"></script>
    <script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
  <!--   <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/dataTables.bootstrap4.js"></script> -->
    <script src="<?php echo base_url(); ?>sweetalert-master/dist/sweetalert.min.js"></script>

    <!--FOnt-->
    <link href="https://fonts.googleapis.com/css?family=Muli|Roboto|Dosis" rel="stylesheet">
  
    
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
                      <?php if($this->cart->total_items() > 0) : ?>
	                    <li><a href="<?php echo base_url('restaurant/detail/'.$this->session->userdata('restaurant_name')) ?>" ><?php echo $this->cart->total_items() ?>
	                      <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size:1.7em"></i>
	                    </a></li>
                    <?php endif; ?>
	                      <li><a href="<?php echo base_url(); echo $this->session->userdata('type');?>/profile/<?php echo $this->session->userdata('user_id') ?>"><?php echo $this->session->userdata('name') ?></a></li>
                        
	                      <!-- <li><a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/edit_profile/<?php echo $this->session->userdata('user_id') ?>" class="nav-link">Edit Profile</a></li> -->
	                      <li><a href="<?php echo base_url('user/credits') ?>"><?php echo NZD($this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits')) ?></a></li>
	                      <li><a href="<?php echo base_url('login/signout') ?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
	                  </ul>
	                <?php endif; ?>
	               </div>
	            </div>
	          </nav>
      </div>
  </header>

  <!-- <?php if($this->session->flashdata('failed')): ?>
  <div class="alert alert-danger">
    <?php echo $this->session->flashdata('failed'); ?>
  </div>
  <?php endif; ?> -->



<!--Full Div Image from div bg-->
<div id="iscroll" style="background-attachment:fixed;">
  <div id="wrap">
    <div class="container-fluid image-full" id="top" style="background-size: cover; background-position:center center ;background-repeat: no-repeat;background-image: url(<?php echo base_url().$background ?>); padding-top:0px;" data-stellar-background-ratio="0.3" data-stellar-vertical-offset="50">
        <div class="row" id="body">
            <form role="form" action="<?php echo base_url('restaurant/detail/') ?>" method="post" id="search">
            <div class="form-group center-block" id="search_bar" style="margin-top:20%;">
                <div class="input-group">
                    <input type="text" autocomplete="off" name="restaurant-search" class="form-control" id="restaurant-search" placeholder="Search for restaurant" style="-webkit-box-shadow: none !important;  -moz-box-shadow: none !important;  box-shadow: none !important; border-radius:0px;">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="search" onclick="submit()">
                    <span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>




<div id="main">
   <div class="container-fluid">
        <?php echo $body ?>
    </div>
    
</div>

<footer>
  <div class="container-fluid">
    <div class="row text-center" style="padding: 10px; font-size:80%;">
      <img src="<?php echo base_url()?>images/logo.png" width="50px" style="margin-right:1em;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation.
    </div>
  </div>
</footer>


<!-- Modal -->
<?php if($this->session->userdata('isLogged') == false) $this->load->view('login/login'); ?>
<?php $this->load->view('restaurant/cart_check'); ?>
        
  
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>

$(document).ready(function(){
  $(window).stellar(
    {
      horizontalScrolling: false
    });
});

(function(){
  var ua = navigator.userAgent,
    isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);

  if (isMobileWebkit) {
    $('html').addClass('mobile');
  }

})();

</script>
<script>

    var waypoint = new Waypoint({
      element: document.getElementById('restaurant-search'),
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
</script>


<script>

    function submit(){

        $("#search").submit();
}

</script>

</body>
</html>