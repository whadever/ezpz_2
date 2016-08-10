<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			if($this->session->userdata('isLogged') == TRUE){
				
				redirect($this->session->userdata('type'));	
			
			}
			$data['page_title'] = 'Home';
			
			$this->template->load('default','main/home' ,$data);	
			
		}

		public function about(){
			$data['page_title'] = 'About';
			$this->template->load('default','about' ,$data);	
		}

		



	}
?>