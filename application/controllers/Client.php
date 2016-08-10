<?php 

class Client extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Client';

		$this->template->load('default','user/home',$data);

	}
}

 ?>