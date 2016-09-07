<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin - EZPZ</title>

    <!-- CSS-->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>datatables/css/dataTables.bootstrap4.css">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon.jpg">
    <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/dataTables.bootstrap4.js"></script>
    
    
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
		body{
			font-family: 'Karla', sans-serif !important;
		}

		.sidenav {
		    height: 100%; /* 100% Full-height */
		    width: 0; /* 0 width - change this with JavaScript */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Stay on top */
		    top: 0;
		    left: 0;
		    background-color: #34495e; /* Black*/
		    color: #fff;
		    overflow-x: hidden; /* Disable horizontal scroll */
		    padding-top: 60px; /* Place content 60px from the top */
		    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */

		}

		/* The navigation menu links */
		.sidenav a {
		    padding: 8px 8px 8px 32px;
		    text-decoration: none;
		    font-size: 25px;
		    color: #fff;
		    display: block;
		    transition: 0.3s;
		    
		}

		/* When you mouse over the navigation links, change their color */
		.sidenav a:hover, .offcanvas a:focus{
			background-color: rgba(236, 240, 241,0.5);
		    color: #f1f1f1;
		}

		/* Position and style the close button (top right corner) */
		.closebtn {
		    position: absolute;
		    top: 0;
		    right: 25px;
		    font-size: 36px !important;
		    margin-left: 50px;
		}

		/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
		#main {
		    transition: margin-left .5s;
		    padding: 0px;
		}

		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
		    .sidenav {padding-top: 15px;}
		    .sidenav a {font-size: 18px;}
		}

		#menu-button{
			
			background-color: transparent;
			border : 1px solid #CCC;
			border-radius: 5px;
			

		}

		#menu-button:hover{
			background-color: #FFF12C;
			-webkit-transition: all 1s ease;
			-moz-transition: all 0.6s ease;
			-ms-transition: all 0.6s ease;
			-o-transition: all 0.6s ease;
			transition: all 0.6s ease;
		}

		#background-btn{

			padding-top: 50px;

		}

		
		.bottom-align-text {
		    position: absolute;
		    bottom: 0;
		    width: 100%;
		    font-size: 10px;
	    }

	    .sidenav a{
	    	font-size: 18px;
	    	border-bottom: none;
	    }

		.modal-header{
			background-color: #FFF12C;
			color: black;
		}

		.modal-footer{
			background-color: #FFF12C;
		}

		.btn-primary:hover{
			background-color: #FFF12C;
			border: 1px solid black;
			color: black;	
		}

		.btn-primary{
			background-color: black;
			color: white;
			border: 1px solid black;
		}
			
		.btn-primary:focus, .btn-primary.focus {
	      background-color: #FFF12C;
		  border: 1px solid black;
		  color: black; 
	    }

	    .btn-primary:active:hover, .btn-primary:active:focus, .btn-primary:active.focus, .btn-primary.active:hover, .btn-primary.active:focus, .btn-primary.active.focus, .open > .btn-primary.dropdown-toggle:hover, .open > .btn-primary.dropdown-toggle:focus, .open > .btn-primary.dropdown-toggle.focus {
	      color: #FFF12C ;
	      background-color: black;
	      border-color: black;
	    }

	    .btn-warning{
			background-color: transparent;
			color: black;
			border: 1px solid black;
		}

		.btn-warning:hover{
			background-color: #FFF12C;
			border: 1px solid black;
			color: black;	
		}
			
		.btn-warning:focus, .btn-warning.focus {
	      background-color: #FFF12C;
			border: 1px solid black;
			color: black;	
	    }

	    .btn-warning:active:hover, .btn-warning:active:focus, .btn-warning:active.focus, .btn-warning.active:hover, .btn-warning.active:focus, .btn-warning.active.focus, .open > .btn-warning.dropdown-toggle:hover, .open > .btn-warning.dropdown-toggle:focus, .open > .btn-warning.dropdown-toggle.focus {
	      background-color: #FFF12C;
			border: 1px solid black;
			color: black;	
	    }
		
		.table-striped tbody tr:nth-of-type(odd) {
	    	background-color: #EFEFFE ;
		}
	</style>


  </head>

  <body>

  <div id="mySidenav" class="sidenav">
	  <div class="company_logo" style="margin-bottom: 30px; padding-left: 32px">
	  	<img src="<?php echo base_url()?>logo.png" width="100px" class="hidden-xs" style="margin-left:15%">
	  </div>
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="border-bottom: none">&times;</a>
	  <a href="<?php echo base_url('admin') ?>">Home</a>
	  <a href="<?php echo base_url('admin/users/1') ?>">User List</a>
	  <a href="<?php echo base_url('admin/drivers/1') ?>">Driver List</a>
	  <a href="<?php echo base_url('admin/clients/1') ?>">Client List</a>
	  <a href="<?php echo base_url('admin/cuisines') ?>">Cuisines</a>
	  <a href="<?php echo base_url('home/change_pass') ?>">Change Password</a>
	  <a href="<?php echo base_url('admin_login/logout') ?>">Logout</a>
	  <div class="bottom-align-text text-center">Copyright &copy; 2016 | Hassee Developers</div>
  </div>

<div class="container-fluid">
  	<div id="main">
	  <div class="row">
	  	<div class="col-xs-2">
	  		<div id="background-btn" class="col-xs-4">
				<button id="menu-button" onclick="openNav()"><img src="<?php echo base_url() ?>assets/menu.png" width="30" alt="">
				</button>
			</div>
	  	</div>
	  	<div class="col-xs-8">
		  	<div class="row">
		  		<div class="col-sm-4"></div>
		  		<div class="col-sm-4 text-center">
		  			<img src="<?php echo base_url() ?>assets/logo.jpg" style="margin-bottom:10px; padding-top: 20px;width:100%" class="img img-responsive" alt="">
		  		</div>
		  		<div class="col-sm-4"></div>
	  		</div>
	  	</div>
	  	<div class="col-xs-2">
	  	</div>
	  </div>
	  <hr>
		
		<div class="row">
			<div class="col-xs-12" style="margin-bottom:20px;">
				<?php echo $body ?>
			</div>
		</div>
	</div>
</div>

<footer>
  <div class="container-fluid">
    <div class="row text-center" style="padding: 10px;">
      <img src="<?php echo base_url()?>images/logo.png" width="50px" style="margin-right:1em;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation.
    </div>
  </div>
</footer>


    <script>
	/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("main").style.marginLeft = "250px";
	    //document.getElementByClassName("nth-of-type(odd)").style.backgroundColor = "rgba(0,0,0,0.4)";
	    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

	}

	/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    document.getElementById("main").style.marginLeft = "0";
	    document.body.style.backgroundColor = "white";
	}
	</script>
    
  </body>
</html>