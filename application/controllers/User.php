<?php 

class User extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Home';

		$this->template->load('default','user/home',$data);

	}

	public function register(){

		$data['page_title'] = 'Register';

		$this->template->load('default_login', 'user/register',$data);

	}

	public function submit(){

		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			$data['page_title'] = 'Register';

			$this->template->load('default_login', 'user/register',$data);

		}
		else{
			if($this->input->post('register')){
				$verification_code = verification_code();

				$verification_string = $this->input->post('username') . '~' . $verification_code;
				$data = array(

					'username' 			=> $this->input->post('username'),
					'password' 			=> hash_password($this->input->post('password')),
					'email' 			=> $this->input->post('email'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'verification_code'	=> $verification_code,
					'created'			=> date('Y-m-d')

					); 

				$this->crud_model->insert_data('users',$data);
				$this->email_model->verification_email($data['email'], $verification_string);
				$this->session->set_flashdata('success', 'User has been added');

				redirect('login');
			}
			else{
				redirect('user/register');
			}
		}
	}
}

 ?>