<?php 

class Driver extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'driver'){

			redirect($this->session->userdata('type'));
			
		}

	}

	public function index(){

		$data['page_title'] = 'Driver';

		$this->template->load('default_driver','driver/home',$data);

	}
}

 ?>