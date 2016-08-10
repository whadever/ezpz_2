<?php 

class Client extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE)
			redirect('main');

	}

	public function index(){

		$data['page_title'] = 'Client';

		$this->template->load('default','user/home',$data);

	}
}

 ?>