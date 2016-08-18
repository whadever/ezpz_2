<?php 
	
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('NZ');

	}

	public function index(){

		redirect('main');


	}

	public function signout ()
		{
			if($this->session->userdata('admin_isLogged') == True)
			{
				$session_des = array('username', 'name', 'user_id', 'data_complete', 'is_verified', 'isLogged', 'type');	
				$this->session->unset_userdata($session_des);
				redirect('admin');
			}else if($this->session->userdata('isLogged') == True)
			{
				$this->session->sess_destroy();
				redirect('main');
			}else{
				redirect('main');
			}
		}


	public function register($type = '')
	{
		$data['background'] = $data['background'] = base_url()."images/pihza.jpg";

			if($this->session->userdata('type') == 'user' || !$this->session->userdata('user_id'))
			{
				if($type == 'user')
				{
					$data['page_title'] = 'Register User';
					$this->template->load('default_login','login/register_user', $data);
				}
				else if($type == 'driver')
				{
					$data['page_title'] = 'Register Driver';
					$this->template->load('default_login','login/register_driver', $data);
				}
				else if($type == 'client')
				{
					$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();
				
					$data['page_title'] = 'Register Client';
					$this->template->load('default_login','login/register_client', $data);
				}
			}else{
				redirect('main');
			}
		
	}

	public function register_user(){

		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			$data['page_title'] = 'Register';


			$this->template->load('default_login', 'login/register_user',$data);


		}
		else{
			if($this->input->post('register')){

				$config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 5000;
	            // $config['max_width']            = 1000;
	            // $config['max_height']           = 768;

	            
									
				$config['upload_path']          = 'uploads/user/' . $this->input->post('username');
				$config['overwrite']			= True;
				$config['file_name']			= 'photo.jpg';
				$this->upload->initialize($config);

				//Check if the folder for the upload existed
				if(!file_exists($config['upload_path']))
				{
					//if not make the folder so the upload is possible
					mkdir($config['upload_path'], 0777, true);
				}

                if ($this->upload->do_upload('photo'))
                {
                    //Get the link for the database
                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
                }



				$verification_code = verification_code();

				$verification_string = $this->input->post('username') . '~' . $verification_code;
				$data = array(

					'username' 			=> $this->input->post('username'),
					'firstname'			=> $this->input->post('firstname'),
					'lastname'			=> $this->input->post('lastname'),
					'password' 			=> hash_password($this->input->post('password')),
					'email' 			=> $this->input->post('email'),
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'photo'				=> $photo,
					'verification_code'	=> $verification_code,
					'created'			=> date('Y-m-d')

					); 

				$this->crud_model->insert_data('users',$data);
				$this->email_model->verification_email($data['email'], $verification_string);
				$this->session->set_flashdata('success', 'User has been added');

				redirect('login');
			}
			else{
				redirect('login/register/user');
			}
		}
	}

	public function register_driver(){
		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			$data['page_title'] = 'Register';

			$this->template->load('default_login', 'login/register_driver',$data);

		}else{
			if($this->input->post('register')){
				$verification_code = verification_code();
				$verification_string = $this->input->post('username') . '~' . $verification_code;

				$config['allowed_types']        = 'jpg|png';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            
										
					$config['upload_path']          = 'uploads/driver/' . $this->input->post('username');
					$config['overwrite']			= True;
					$config['file_name']			= 'photo.jpg';
					$this->upload->initialize($config);

					//Check if the folder for the upload existed
					if(!file_exists($config['upload_path']))
					{
						//if not make the folder so the upload is possible
						mkdir($config['upload_path'], 0777, true);
					}

	                if($this->upload->do_upload('photo'))
	                {
	                    //Get the link for the database
	                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	                }


				$data = array(

						'username' 			=> $this->input->post('username'),
						'firstname'			=> $this->input->post('firstname'),
						'lastname'			=> $this->input->post('lastname'),
						'email' 			=> $this->input->post('email'),
						'telephone'		 	=> $this->input->post('telephone'),
						'address' 			=> $this->input->post('address'),
						'ird'	 			=> $this->input->post('ird'),
						'driver_license' 	=> $this->input->post('driver_license'),
						'license_type' 		=> $this->input->post('license_type'),
						'photo'				=> $photo,
						'verification_code'	=> $verification_code,
						'created'			=> date('Y-m-d')

						);
				
				$this->crud_model->insert_data('drivers', $data);
				$this->email_model->verification_email($data['email'], $verification_string);
				$this->session->set_flashdata('success','Driver has been added');

				redirect('login');
			}
			else{
				redirect('login/register/driver');
			}
		}


	}

	public function register_client(){
		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('name', 'Restaurant Name', 'is_unique[restaurants.name]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			$data['page_title'] = 'Register';
			$data['background'] = $data['background'] = base_url()."images/pihza.jpg";

			$this->template->load('default_login', 'login/register_client',$data);

		}
		else{
			if($this->input->post('register')){
				
					
					
					$config['allowed_types']        = 'jpg|png';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            
										
					$config['upload_path']          = 'uploads/restaurant/' . $this->input->post('username');
					$config['overwrite']			= True;
					$config['file_name']			= 'photo.jpg';
					$this->upload->initialize($config);

					//Check if the folder for the upload existed
					if(!file_exists($config['upload_path']))
					{
						//if not make the folder so the upload is possible
						mkdir($config['upload_path'], 0777, true);
					}

	                if ($this->upload->do_upload('photo'))
	                {
	                    //Get the link for the database
	                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	                }

					$data = array(

					'username' 			=> $this->input->post('username'),
					'name'				=> $this->input->post('name'),
					'email' 			=> $this->input->post('email'),
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'cuisine_id'		=> implode(', ', $this->input->post('cuisine')),
					'photo'				=> $photo,
					'created'			=> date('Y-m-d')

					);
					$this->crud_model->insert_data('restaurants',$data);
					$restaurant_id = $this->crud_model->get_by_condition('restaurants',array('username' => $this->input->post('username')))->row('id');

					$data_time = array(
						'day' => $this->input->post('day'),
						'opentime' => $this->input->post('opentime'),
						'closetime' => $this->input->post('closetime')
					);

				for($i = 0; $i < count($data_time['day']); $i++){
					$data_insert = array(
							'day' => $data_time['day'][$i],
							'opentime' => $data_time['opentime'][$i],
							'closetime' => $data_time['closetime'][$i],
							'restaurant_id' => $restaurant_id
						);
					
					$this->crud_model->insert_data('restaurant_time',$data_insert);
				}	
				
				$this->session->set_flashdata('success', 'Client has been added');

				redirect('login');
		 	}
		 	else{
		 		redirect('login/register/client');
		 	}
		 }


	}

	public function sign_in(){

		if($this->input->post('login')){

			$username = $this->input->post('username');
			$password = hash_password($this->input->post('password'));

			$user = $this->login_model->check_user($username,$password);
			if($user && $user->is_verified == 1){
				if($user->type == 'client'){
					$name = $user->name;
				}else{
					$name = $user->firstname .' '. $user->lastname;
				}

				$data_session = array(

					//Set the session for login
							

					'username'		=> $username,
					'name'			=> $name,
					'user_id'		=> $user->id,
					'isLogged'		=> TRUE,
					'type'			=> $user->type
								

					);
				$this->session->set_userdata($data_session);

				redirect($user->type);
			}else{
				redirect('main');
			}
		}

	}


}

 ?>