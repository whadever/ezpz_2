<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			$data['page_title'] = 'Home';
			$data['cuisines']	= array('Asian', 'Udang', 'kentang', 'Irvan', ' Jonathan', 'setyawan', 'felita','Other');
			$data['restaurants'] = $this->db->get('restaurants')->result_array();
			
			$this->template->load('default','home' ,$data);	
			
		}

		public function about(){
			$data['page_title'] = 'About';
			$this->template->load('default','about' ,$data);	
		}

		public function add_partner($param1 = ''){
			if($param1 == '')
			{
				$data['page_title'] = 'Partner Registration';

				$this->load->view('template/header',$data);
				$this->load->view('add_partner');
				$this->load->view('template/footer');

				$this->template->load('default','add_partner' ,$data);	
			}
		// 	else if($param1 == 'submit')
		// 	{
		// 		$new_pass = substr(md5(microtime()),rand(0,26),5);

		// 		$data = array(
		// 			'username' => $this->input->post('name'),
		// 			'password' => $new_pass,
		// 			'name' => $this->input->post('name'),
		// 			'address' => $this->input->post('address'),
		// 			'cuisine' => implode(', ',$this->input->post('cuisine')),
		// 			'opentime' => $this->input->post('opentime'),
		// 			'closetime' => $this->input->post('closetime'),
		// 			'opendays' => implode(', ',$this->input->post('opendays')),
		// 			'photo' => $this->input->post('photo'),
		// 			'phone' => $this->input->post('phone'),
		// 			'email' => $this->input->post('email'),
		// 			'created' => date('Y-m-d')
		// 			);

		// 		echo '<pre>';
		// 		print_r($data);
		// 		echo '</pre>';

		// 		$this->load->model('login_model');

		// 			//Check if The Username is unique
		// 			if(!$this->login_model->insert_data_new_user('user', $data))
		// 			{
		// 				$this->session->set_flashdata('error', 'Username or Email has been Registered');

		// 				redirect('accounts/signup/user');
		// 			}else
		// 			{
		// 				$this->login_model->email('verify_account', $data['email'], $verification_string);
		// 				$this->session->set_flashdata('success', 'User has been added');

		// 				redirect('accounts/signup/user');
		// 			}
		// 	}
			
	}



	}
?>