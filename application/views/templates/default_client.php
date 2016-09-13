<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title ?> - EZPZ</title>

    <!-- CSS-->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.php" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon.jpg">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>sweetalert-master/dist/sweetalert.css">
    <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.stellar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url(); ?>sweetalert-master/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>
    <!--FOnt-->
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <style>
      
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }
    </style>

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

                <!-- <ul class="nav navbar-nav navbar-left">
                  <li><a href="<?php echo base_url('client') ?>" class="nav-link">Home</a></li>
                  
                 
                  
                  <li role="separator" class="divider" style="background-color: white; height: 1px"></li>
                </ul> -->
              
                  <ul class="nav navbar-nav navbar-right">
                      <!-- <li><a href="#"><?php echo $this->session->userdata('username') ?></a></li>
                     
                         

                      <li><a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/complete_data" >Edit Profile</a></li>

                      <li><a href="#">Edit Menu</a></li> -->
                      <li><a href="<?php echo base_url('main') ?>"><?php echo $this->session->userdata('username') ?></a></li> 

                      <li><a href="<?php echo base_url('client/menu') ?>">Update Menu</a></li> 
                      
                      <li><a href="<?php echo base_url('login/signout') ?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                  </ul>
               
               

              </div>
            </div>
          </nav>

      </div>

  </header>

  <div class="container-fluid image-full" id="top" style="background-size: cover; background-position:center center ;background-repeat: no-repeat; background-image: url(<?php echo base_url().$background ?>)" data-stellar-background-ratio="0.5">
  <div class="row" id="body">
  </div>
</div>

  <div class="container">
    <?php echo $body ?>
  </div>

  <footer>
  <div class="container-fluid">
    <div class="row text-center" style="padding: 10px;">
      <img src="<?php echo base_url()?>images/logo.png" width="50px" style="margin-right:1em;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation.
    </div>
  </div>
</footer>

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
</script>
  </body>
  
</html>