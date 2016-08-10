<?php 
	
class Login extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Login';

		$this->template->load('default_login','login/login',$data);


	}

	public function signout(){

		$this->session->sess_destroy();

		redirect('login');

			
	}

	public function sign_in(){

		$username = $this->input->post('username');
		$password = hash_password($this->input->post('password'));

		$user = $this->login_model->check_user($username,$password);
		print_r($user);
		if($user){

			$data_session = array(

				//Set the session for login
						

				'username'		=> $username,
				'name'			=> $user->firstname .' '. $user->lastname,
				'user_id'		=> $user->id,
				'isLogged'		=> TRUE,
				'type'			=> $user->type
							

				);
			$this->session->set_userdata($data_session);

			redirect($user->type);
		}

	}


}

 ?>