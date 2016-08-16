<?php 

class Client extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'client'){

			redirect($this->session->userdata('type'));
			
		}
		date_default_timezone_set('NZ');

	}

	public function index(){

		$data['page_title'] = 'Client';

		$this->template->load('default_client','client/home',$data);

	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}


		$data['page_title'] = 'Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['client'] = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
		$this->template->load('default_client','client/profile', $data);
	}

}

 ?>