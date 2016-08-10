<?php 

class Driver extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Driver';

		$this->template->load('default','user/home',$data);

	}
}

 ?>