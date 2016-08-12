<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Log In</title>

    <!-- CSS-->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>datatables/css/dataTables.bootstrap4.css">
    <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>datatables/js/dataTables.bootstrap4.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

		body{
			padding: 5% 0;
      background-image: url('./assets/background.jpg');
      background-size:     cover;                      
      background-repeat:   no-repeat;
      background-position: center; 
      background-attachment: fixed;
      color: white ;
      font-family:  'Roboto', sans-serif;
    }

    .btn-primary{
      background-color: transparent;
      border: none;
      
      color: white; 
    }

    .btn-primary:hover{
      background-color: transparent;
      color: white;
      border: none;
      box-shadow: 0px 0px 10px #FFF;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }
      .form-control:focus {
      border-bottom : 1px solid white;
      border-color: #FFF;
      border-radius: 0;
      outline: none;
    
      box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #FFF;
      }
    
    
    .form-control{
      background-color: transparent;
      border: none;
      border-bottom : 1px solid white;
      border-radius: 0;
      color: white;
      font-weight: 300;
    }

}
    
    


	</style>


</head>
<body>
  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-4"></div>
      <div class="col-sm-4 col-xs-12">
      
      
      
    </div>
    <div class="col-sm-4"></div>
  </div>
    <div class="row">
    	<div class="col-sm-4"></div>
    	<div class="col-sm-4 col-xs-12" style=" padding: 2% 3%; border-radius: 6px; background-color: transparent; ">
    		<?php echo form_open('admin_login/login') ?>
          
          <div class="form-group">
            
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>

          <div class="form-group">
           
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>

          <div class="form-group text-center">
            <input type="submit" name="submit" value="Log In" class="btn btn-primary">
          </div>

    		<?php echo form_close(); ?>
    	</div>
    	<div class="col-sm-4"></div>
    </div>
  </div>
	

  
</body>
</html>