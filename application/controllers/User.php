<?php 

class User extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'user'){

			redirect($this->session->userdata('type'));
			
		}

	}

	public function index(){

		$data['page_title'] = 'Home';

		$this->template->load('default','user/home',$data);

	}

	public function register(){

		$data['page_title'] = 'Register';

		$this->template->load('default_login', 'user/register',$data);

	}

	public function submit(){

		
	}
}

 ?>