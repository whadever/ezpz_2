<?php 

class Driver extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'driver'){

			redirect($this->session->userdata('type'));
			
		}
		
		date_default_timezone_set('NZ');
	}

	public function index(){

		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";

		$this->template->load('default_driver','driver/home',$data);

	}

	public function direction(){
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
		$this->template->load('default_driver', 'driver/direction',$data);
	}

	public function test_map(){
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
		$this->load->view('driver/test_map');
	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('driver');
		}


		$data['page_title'] = 'Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$this->template->load('default_driver','driver/profile', $data);
	}


}

 ?>