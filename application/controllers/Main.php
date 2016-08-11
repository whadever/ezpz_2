<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			if($this->session->userdata('isLogged') == TRUE){
				
				redirect($this->session->userdata('type'));	
			
			}
			$data['page_title'] = 'Home';
			$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();
			$data['lists'] = $this->crud_model->get_data('restaurants')->result();
			
			$this->template->load('default','main/home' ,$data);	
			
		}

		public function about(){
			$data['page_title'] = 'About';
			$this->template->load('default','about' ,$data);	
		}

		



	}
?>