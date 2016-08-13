
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $page_title; ?> - EZPZ</title>
    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>datatables/css/dataTables.bootstrap4.css">



    <!-- Begin Scripts -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.waypoints.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/dataTables.bootstrap4.js"></script>
    
    <style>
      #map {
        height: 600px;
        width: 100%;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        height: 100%;
        
        width: 390px;
       
      }
      
     
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
    
</head>

<body>

  <header>
  <!--NavBar-->
      <div class="container-fluid">
          
          <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="<?php echo base_url('main') ?>">EZPZ</a>
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
                      <li><a href="#"><?php echo $this->session->userdata('username') ?></a></li>
                     
                         

                      <li><a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/complete_data" >Edit Profile</a></li>

                      <li><a href="#">Top Up Wallet</a></li>
                       
                      
                      <li><a href="<?php echo base_url('login/signout') ?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                  </ul>
                <?php endif; ?>
               

              </div>
            </div>
          </nav>

      </div>

  </header>

  <!--Full Div Image from div bg-->
<div class="container-fluid image-full" id="top" style="background-size: cover; background-position:center center ;background-repeat: no-repeat; background-image: url(<?php echo $background ?>)">

</div>

<div id="main">
    <div class="container-fluid">
        <?php echo $body ?>
    </div>
</div>

<script>
    var waypoint = new Waypoint({
      element: document.getElementById('search'),
      handler: function(direction) {
        document.getElementById('navbar').style.backgroundColor = '#5bc0de';
           }
    });

</script>

<script>
    var waypoint2 = new Waypoint({
      element: document.getElementById('top'),
      handler: function(direction) {
        document.getElementById('navbar').style.backgroundColor = "transparent";
     
       
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