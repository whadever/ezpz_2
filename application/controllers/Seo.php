<?php 

class Seo extends CI_Controller{

	function sitemap(){

		$data['urls'] = array('main/about','main','restaurant/cuisine');

		header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);

	}


}


 ?>
