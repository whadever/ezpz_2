<?php 

class User extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Home';

		$this->template->load('default','user/home',$data);

	}
}

 ?>