<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function __construct(){
			parent::__construct();
			date_default_timezone_set('NZ');
			if($this->session->userdata('type') == 'user'){

				if($this->session->userdata('order_status') == 1 ){
					redirect('order/find_driver/'.$this->session->userdata('code'));
				}
				else if( $this->session->userdata('order_status') > 1 && $this->session->userdata('order_status') < 4){
					redirect('order/driver_found/'.$this->session->userdata('code'));
				}

			}else if($this->session->userdata('type') == 'driver'){

				if($this->session->userdata('order_status') == 2 ){
					redirect('driver/accept_order/'.$this->session->userdata('code'));
				}
				else if($this->session->userdata('order_status') == 3 ){
					redirect('driver/delivery/'.$this->session->userdata('code'));
				}

			}
			
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