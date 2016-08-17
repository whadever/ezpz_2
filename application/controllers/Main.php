<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function __construct(){
			parent::__construct();
			date_default_timezone_set('NZ');
		}

		public function index(){
			if($this->session->userdata('isLogged') == TRUE){
				
				redirect($this->session->userdata('type'));	
			
			}
			$data['page_title'] = 'Home';
			$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();
			$data['lists'] = $this->crud_model->get_data('restaurants')->result();
			$data['background'] = base_url()."images/pihza.jpg";
			$this->template->load('default','main/home' ,$data);	
			
		}

		public function about(){
			$data['page_title'] = 'About';
			$data['background'] = base_url()."images/pihza.jpg";
			$this->template->load('default','main/about' ,$data);	
		}

		



	}
?>