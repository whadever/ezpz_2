<?php 
  header("Content-type: text/css; charset: UTF-8");
  
  include_once("../application/libraries/config.php");
  /** CEK KONEKSI **/

 ?>

/* Import Media Query */
@import url('media.css');

/*footer*/
footer{
  background-color: <?php echo $row->primary_color ?>;
  color: <?php echo $row->secondary_color ?>;
}

/* footable */
.footable{
  background :white !important;
  border : 2px solid <?php echo $row->primary_color ?> !important;
  width: 100% !important;
}

.footable>thead>tr>th, .footable>thead>tr>td { 
  
  background-color : <?php echo $row->primary_color ?> !important;
  border : 1px solid <?php echo $row->primary_color ?> !important

}

.footable>tfoot>tr>th, .footable>tfoot>tr>td { 
  
  background-color : <?php echo $row->primary_color ?> !important;
  border : 1px solid <?php echo $row->primary_color ?> !important

}


.footable-row-detail-cell{
  width : 100% !important;
}

.footable-row-detail-value{
  word-break : keep-all !important;
}

/*Panel Review*/
.profile-picture{
  border-radius: 50px;
  height:60px; 
  width:60px; 
  background-size:cover;
  background-position: center center; 
  margin: auto;
}
#review .panel.panel-horizontal {
    display:table;
    margin-top: 2%;
    width:100%;
}
#review .panel.panel-horizontal > .panel-heading, #review .panel.panel-horizontal > .panel-body, #review .panel.panel-horizontal > .panel-footer {
    display:table-cell;
    margin-left: 0;
}
#review .panel.panel-horizontal > .panel-heading, #review .panel.panel-horizontal > .panel-footer {
    width: 10%;
    text-align: center;
    border:0;
    vertical-align: middle;
}
#review .panel.panel-horizontal > .panel-heading {
    border-top-right-radius: 0;
    border-bottom-left-radius: 4px;
    background-color: #fff;
}
#review .panel.panel-horizontal > .panel-footer {
    border-top-left-radius: 0;
    border-bottom-right-radius: 4px;
}

/**/
header .navbar-default{
  background-color: <?php echo $row->primary_color ?>;
}
header .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: <?php echo $row->secondary_color ?>;
    background-color: transparent;
}

header .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: <?php echo $row->secondary_color ?>;
    background-color: transparent;
}

header .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: transparent;
    border-color: transparent;
}

/*table*/


body.modal-open {
    overflow: auto;
}
body.modal-open[style] {
    padding-right: 0px !important;
}

.modal::-webkit-scrollbar {
    width: 0 !important; /*removes the scrollbar but still scrollable*/
    /* reference: http://stackoverflow.com/a/26500272/2259400 */
}
/*Tables*/
.table-bordered th,.table-bordered td{
  border:1px solid <?php  echo $row->primary_color ?> !important;
}

/*REGISTRATION FORMS*/
.col-form{
    border-top:3px solid <?php  echo $row->primary_color ?>;
    margin-top:-70px;
    margin-bottom:20px;
    background-color:#fff;
    padding:35px;
    padding-top: 5px;
}

#map{
  height: 400px;
}

label{
  letter-spacing: 1px;
}

/*General*/

.input-group-addon{
    background-color: <?php echo $row->primary_color ?> !important;
    border-radius: 0px !important;
    border:3px solid <?php echo $row->primary_color ?> !important;
    color: <?php echo $row->secondary_color ?> !important;
  }

.form-control:focus {
  border-color: #95a5a6 !important;
  border-radius: 0;
  outline: none;    
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #FFF;
}
.form-control{
  border-radius: 0px !important;
  box-shadow: none !important;
  border-color: <?php echo $row->primary_color ?> !important;
}


.panel-default{
  border-radius: 0px;
  border-color: <?php echo $row->primary_color ?>;
}


.modal-content{
  border-radius: 0px;
}

.modal .modal-header{
  background-color: <?php echo $row->primary_color ?>; 
  color:<?php echo $row->secondary_color ?>;
}

.modal .modal-header .close{
  color:<?php echo $row->secondary_color ?>;
}

.modal{
  top: 20%;
}

.padding-top-five{
  padding-top: 5%;
}
body{
  font-family: 'Muli', sans-serif !important;
}
.btn-primary{
  background-color: <?php echo $row->primary_color ?> ; 
  border-color: <?php echo $row->primary_color ?> ;
  border-radius: 0px ;
}
.btn-primary:hover{
  background-color: <?php echo $row->primary_color ?> ;
}


.nav-tabs {
    margin-bottom: 0;
}

/*For navbar*/
.nav.navbar-nav a {
  position: relative;
  color: <?php echo $row->secondary_color ?>;
  text-decoration: none;
}

.nav.navbar-nav a:hover {
  color: <?php echo $row->secondary_color ?>;
}
.nav.navbar-nav a:before {
  content: "";
  position: absolute;
  width: 95%;
  height: 2px;
  bottom: 0;
  left: 4px;
  background-color: #fff;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
.nav.navbar-nav a:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
#myNavbar{
  padding-right: 10px;
}
.navbar-header{
  padding-left: 10px;
}
.nav.navbar-nav.navbar-left a,.nav.navbar-nav.navbar-right a{
	color: <?php echo $row->secondary_color ?>;
}
.nav.navbar-nav.navbar-left a:hover,.nav.navbar-nav.navbar-right a:hover{
  color: <?php echo $row->secondary_color ?>;
}


.nav .navbar-nav .dropdown .dropdown-menu ul li a:hover{
  background-color: transparent;
}
.navbar-default{
    border: none;
    background-color: transparent;
    -webkit-transition: all 0.7s ease;
    -moz-transition: all 0.7s ease;
    -ms-transition: all 0.7s ease;
    -o-transition: all 0.7s ease;
    transition: all 0.7s ease;
}

/* Global */
.navbar-brand a
{
  font-size: 20px;
  color:<?php echo $row->secondary_color ?>;
}



/* typeahead */
.typeahead {
max-height: 200px;
overflow-y: auto;
overflow-x: hidden;
width: 50%;
}

/* panel */
.panel a{
  text-decoration: none;
  color: black;
}
.panel a:hover,a:active{
  text-decoration: none;
  color: black;
}

/*Css for the full width image div*/
.image-full{
	height: 400px;
	padding-top: 20%;
  background-attachment:fixed;
}
#search_bar{
  width:50%;
}

.mobile #top
{
  background-attachment:local;
}
/*What can You Do box*/
.food-panel{
  border-color: <?php echo $row->primary_color ?>;
  border-radius: 0;
  height: 220px;
}
.do-button{
  background-color: <?php echo $row->primary_color ?>;
  border: 0px;
  border-radius: 0;

}
.do-button:hover{
  background-color: <?php echo $row->primary_color ?>;
}
.do-button p{
  color: <?php echo $row->secondary_color ?> ;
  margin-bottom: 0px;
  padding: 5px;
}
.whatdo{
  margin: 30px auto 50px auto;
}
.whatdo h4{
  font-variant: small-caps;
  font-weight: bold;
}
/*Do button*/
  .panel-text{
    padding-left: 20px;
    padding-right: 20px;
    height: 140px;
  }


/*For the food section*/
.food {
    padding-top: 30px;
    padding-bottom: 70px;
    background-color: #ecf0f1;
}
/*Image + Hover For Cuisines at Home*/
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: #34495e;
  margin-top: 20px;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  padding: 50px 20px;
}

.overlay a
{
  text-decoration: none;
}

.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  width: calc(100% + 20px);
  -webkit-transition: opacity 0.55s, -webkit-transform 0.55s;
  transition: opacity 0.55s, transform 0.55s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-10px,0,0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.hovereffect:hover img {
  opacity: 0.4;
  filter: alpha(opacity=40);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect h2 {
  text-transform: uppercase;
  color: <?php echo $row->secondary_color ?>;
  text-align: center;
  position: relative;
  font-size: 17px;
  overflow: hidden;
  padding: 0.5em 0;
  background-color: transparent;
}

.hovereffect h2:after {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: #fff;
  content: '';
  -webkit-transition: -webkit-transform 0.55s;
  transition: transform 0.55s;
  -webkit-transform: translate3d(-100%,0,0);
  transform: translate3d(-100%,0,0);
}

.hovereffect:hover h2:after {
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect a, .hovereffect p {
  color: <?php echo $row->secondary_color ?>;
  opacity: 0;
  filter: alpha(opacity=0);
  font-variant: small-caps;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(100%,0,0);
  transform: translate3d(100%,0,0);
}

.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

/*Edit Profile Page*/
#edit-prof-pic{
  width: 150px; 
  height:150px; 
  border-radius:100px;
  margin-bottom:20px;
  border: 1px solid #2c3e50;
}
#profile-name{
  font-weight: bold;
  margin-top: 8px;
  font-size: 20px;
}

.navbar-default .navbar-brand
{
  color:<?php echo $row->secondary_color ?> !important; 
}

.headline
{
  font-size:36px;
  font-weight: bold;
  margin-bottom: 30px;
  font-family: 'Dosis', sans-serif !important; 
  text-align: center;

}
/*Pills and tab content for edit profile on client user and driver*/
.nav-pills>li>a{
  border-radius: 0px;
  color: #95a5a6;
}
.nav-pills>li>a:hover{
  color: <?php echo $row->primary_color ?>;
  background-color: transparent;
}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
  color:<?php echo $row->primary_color ?>;
  background-color:transparent;
  border-right: 4px solid #34495e;      
}
.profile-content{
  padding-top: 0px !important;
  border:none !important;
  
}

#header{
  background-color: <?php echo $row->primary_color ?>;
  color: <?php echo $row->secondary_color ?>;
  padding: 10px 5px;
  padding-left: 15px;
  margin-bottom: 10px;
}

.profile-content h2{
  margin-top: 0px !important;
  margin-bottom: 0px !important;
}

/* Waiting for Drivers */
.waiting
{
  font-weight:100;
  font-size:72px;
}

.roboto
{ 
  font-weight:100; 
}

/* Driver Found */
.driver-info
{
  
  font-size:18px;
  font-weight: lighter;
}

.driver-photo
{
  width: 300px; 
  border-radius:50%; 
  height:300px;
  margin:1em 0 3em 0;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
  
  background-color: <?php echo $row->primary_color ?>;
  border-color: <?php echo $row->primary_color ?>;

}

