<?php 

class User extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'user'){

			redirect($this->session->userdata('type'));
			
		}
		date_default_timezone_set('NZ');



	}

	public function index(){

		$data['page_title'] = 'Home';
		$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['background'] = base_url()."images/pihza.jpg";
		$this->template->load('default','user/home',$data);

	}
}

 ?>