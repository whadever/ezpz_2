<?php 

class Driver extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE)
			redirect('user');

	}

	public function index(){

		$data['page_title'] = 'Driver';

		$this->template->load('default','user/home',$data);

		

	}
}

 ?>