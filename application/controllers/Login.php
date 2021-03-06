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
				$session_des = array('username', 'name', 'user_id', 'order_status','rating','code', 'is_verified', 'isLogged', 'type');	
				$this->session->unset_userdata($session_des);
				redirect('admin');
			}elseif($this->session->userdata('isLogged') == True)
			{
				//Delete All Pending Orders
				if($this->crud_model->get_by_condition('orders', array('user_id' => $this->session->userdata('user_id'), 'status' => 0))->num_rows()>0)
				{
					//Delete Old Order
					$code = $this->crud_model->get_by_condition('orders', array('user_id' => $this->session->userdata('user_id')))->row()->code;
					$this->crud_model->delete_data('orders', array('user_id' => $this->session->userdata('user_id')));
					$this->crud_model->delete_data('order_detail', array('code' => $code));

				}

				$this->session->sess_destroy();
				redirect('main');
			}else{
				redirect('main');
			}
		}


	public function register($type = '')
	{
		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] = $data['configuration']->background;

			if($this->session->userdata('type') == 'user' || !$this->session->userdata('user_id'))
			{
				if($type == 'user')
				{
					$data['page_title'] = 'Register User';
					$this->template->load('default_login','login/register_user', $data);
				}
				elseif($type == 'driver')
				{
					$data['page_title'] = 'Register Driver';
					$this->template->load('default_login','login/register_driver', $data);
				}
				elseif($type == 'client')
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
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$data['background'] = $data['configuration']->background;


			$this->template->load('default_login', 'login/register_user',$data);


		}
		else{
			if($this->input->post()){

				$config['allowed_types']        = 'jpg|png|jpeg';
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
                	$image = $this->upload->data();
                    //Get the link for the database
                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
                }else{
                	$photo = '';
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
					'telephone' 		=> '+64'.$this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'photo'				=> $photo,
					
					'verification_code'	=> $verification_code,
					'created'			=> date('Y-m-d')

					);
				$this->crud_model->insert_data('users',$data);

				$user = $this->crud_model->get_by_condition('users',array('username' => $this->input->post('username')))->row();

				$name = $user->firstname .' '. $user->lastname;

				$data_session = array(

					//Set the session for login
							

					'username'		=> $user->username,
					'name'			=> $name,
					'user_id'		=> $user->id,
					'isLogged'		=> TRUE,
					'type'			=> $user->type,
					'isVerified'	=> 0

					);
				$this->session->set_userdata($data_session);	 

				
				$this->email_model->verification_email($data['email'], $verification_string);

				$this->session->set_flashdata('success', 'User has been added');

				redirect('login/verify_account/'.$user->username);
			}
			else{
				redirect('login/register/user');
			}
		}
	}

	public function register_driver(){
		if($this->input->post()){
			// $verification_code = verification_code();
			// $verification_string = $this->input->post('username') . '~' . $verification_code;

			$config['allowed_types']        = 'jpg|png|jpeg';
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
					'telephone' 		=> '+64'.$this->input->post('telephone'),
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
					'address' 			=> $this->input->post('address'),
					'ird'	 			=> $this->input->post('ird'),
					'driver_license' 	=> $this->input->post('driver_license'),
					'license_type' 		=> $this->input->post('license_type'),
					'photo'				=> $photo,
					// 'verification_code'	=> $verification_code,
					'created'			=> date('Y-m-d')

					);

			$this->crud_model->insert_data('drivers', $data);
			$this->email_model->driver_registered($data);
			//$this->email_model->verification_email($data['email'], $verification_string);
			$this->session->set_flashdata('success','You have successfully registered');

			redirect('main');
		}
		else{
			redirect('login/register/driver');
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
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$data['background'] = $data['configuration']->background;


			$this->template->load('default_login', 'login/register_client',$data);

		}
		else{
			if($this->input->post('register')){
				
					
					
					$config['allowed_types']        = 'jpg|png|jpeg';
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
	                	$image = $this->upload->data();
	                    //Get the link for the database
	                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	                }

	                $this->image_moo
					->load($config ['upload_path'] . '/' . $image['file_name'])
					->resize_crop(350,250)
					->save_pa('','_thumb');

					$this->image_moo
					->load($config ['upload_path'] . '/' . $image['file_name'])
					->resize_crop(1300,500)
					->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

	              

					$data = array(

					'username' 			=> $this->input->post('username'),
					'name'				=> $this->input->post('name'),
					'email' 			=> $this->input->post('email'),
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
					'telephone' 		=> '+64'.$this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'cuisine_id'		=> implode(', ', $this->input->post('cuisine')),
					'photo'				=> $photo,
					'thumb'				=> $config ['upload_path'] . '/' . $image['raw_name'].'_thumb'.$image['file_ext'],
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
				$this->email_model->restaurant_registered($data);
				
				$this->session->set_flashdata('success', 'You have successfully registered');

				redirect('login');
		 	}
		 	else{
		 		redirect('login/register/client');
		 	}
		 }


	}

	public function sign_in(){

		if($this->input->post()){

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
					'type'			=> $user->type,
					'isVerified'	=> 1
					
								

					);
				$this->session->set_userdata($data_session);

				$order = '';

				if($user->type == 'user'){

					$order = $this->crud_model->get_by_condition('orders',array('user_id' => $user->id))->row();

					
					

				}elseif($user->type == 'driver'){
					$order = $this->crud_model->get_by_condition('orders',array('driver_id' => $user->id))->row();
				}
				
				
				if($order != ''){
					$this->session->set_userdata(array('order_status' => $order->status, 'code' => $order->code));
					if($order->status == 4 && $user->type == 'user'){
						$this->session->set_userdata(array('rating' => 1));
					}
				}

				echo 'success';
				#redirect($user->type);
			}
			elseif($user && $user->is_verified == 0 && $user->type == 'user'){
				$name = $user->firstname .' '. $user->lastname;

				$data_session = array(

					//Set the session for login
							

					'username'		=> $user->username,
					'name'			=> $name,
					'user_id'		=> $user->id,
					'isLogged'		=> TRUE,
					'type'			=> $user->type,
					'isVerified'	=> 0

					);
				$this->session->set_userdata($data_session);
				echo 'success';
				#redirect('login/verify_account/'.$user->username);
			}
			else{
				echo 'failed'; 
				#redirect('main');
				$this->session->set_flashdata('failed','Incorret Username or Password');
			}
		}

	}

	public function forget ($param1 = 'forget')
	{
		if($param1 == 'forget')
		{
			$data['page_title'] = 'Forget Password';
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$data['background'] = $data['configuration']->background;

			$this->template->load('default_login','login/forget_password', $data);
		}else if($param1 == 'reset')
		{
			$email = $this->input->post('email');
			$new_pass = substr(md5(microtime()),rand(0,26),5);
			
			$user_data = array('email' => $email);

			if($this->crud_model->get_by_condition('users', $user_data)->row())
			{
				$data = array (

				'password'  => $new_pass,
				'type'		=> 'user'

				);

				if($this->login_model->resetPassword($email, $data))
				{
					$this->session->set_flashdata('success', 'swal({   title: "Success",   text: "Reset Password Success! Please Check Your Email", type: "success", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}else
				{
					$this->session->set_flashdata('error', 'swal({   title: "Error",   text: "Email not sent", type: "warning", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}
			}else if($this->crud_model->get_by_condition('drivers', $user_data)->row())
			{
				$data = array (

				'password'  => $new_pass,
				'type'		=> 'driver'

				);

				if($this->login_model->resetPassword($email, $data))
				{
					$this->session->set_flashdata('success', 'swal({   title: "Success",   text: "Reset Password Success! Please Check Your Email", type: "success", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}else
				{
					$this->session->set_flashdata('error', 'swal({   title: "Error",   text: "Email not sent", type: "warning", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}
			}else if($this->crud_model->get_by_condition('restaurants', $user_data)->row())
			{
				$data = array (

				'password'  => $new_pass,
				'type'		=> 'client'

				);

				if($this->login_model->resetPassword($email, $data))
				{
					$this->session->set_flashdata('success', 'swal({   title: "Success",   text: "Reset Password Success! Please Check Your Email", type: "success", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}else
				{
					$this->session->set_flashdata('error', 'swal({   title: "Error",   text: "Email not sent", type: "warning", showConfirmButton: false, timer:1500 });');
					redirect('main');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'swal({   title: "Error",   text: "Email not exist", type: "warning", showConfirmButton: false, timer:1500 });');
				redirect('main');
			}
		}
	}

	public function email_verify($md5 = '')
		{
			if($md5 == '')
			{
				redirect('login/');
			}else
			{
				$separated_code = explode('~', $md5);

				$user = $this->crud_model->get_by_condition('users',array('username'=> $separated_code[0] ,'verification_code' => $separated_code[1]))->row();

				if($this->login_model->verify_account($md5))
				{


					$data_session = array(

						//Set the session for login
						'username'		=> $user->username,
						'name'			=> $user->firstname.' '.$user->lastname,
						'user_id'		=> $user->id,
						'isLogged'		=> TRUE,
						'type'			=> $user->type,
						'isVerified'	=> 1


						);
					$this->session->set_userdata($data_session);

					$this->session->set_flashdata('success', 'Account Verification is Successful!');
					redirect('user');
				}else
				{
					$this->session->set_flashdata('error', 'Account Verification is not Successful!');
					session_destroy();
					redirect('main');
				}
			}

		}

	public function verify_account($username = ''){
		if($username != $this->session->userdata('username')){
			$username = $this->session->userdata('username');
		}elseif($this->session->userdata('isVerified') == 1){
			redirect($this->session->userdata('type'));
		}

		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] = $data['configuration']->background;

		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['page_title'] = "Verify Account";

		$data['user'] = $this->crud_model->get_by_condition('users',array('username' => $username))->row();

		$this->template->load('default', 'login/verify_account',$data);
		
	}

	public function resend_email($username = ''){
		if($username != $this->session->userdata('username')){
			$username = $this->session->userdata('username');
		}elseif($this->session->userdata('type') != 'user' || $this->session->userdata('isVerified') == 1){
			redirect($this->session->userdata('type'));
		}

		$user = $this->crud_model->get_by_condition('users',array('username' => $username))->row();

		$verification_string = $user->username . '~' . $user->verification_code;

		$this->email_model->verification_email($user->email,$verification_string);

		#redirect('login/verify_account/'.$this->session->userdata('username'));

		echo 'success';

	}

	public function test_jquery(){
		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] = $data['configuration']->background;
		$this->template->load('default_login','login/jquery_form',$data);
	}

	public function check_username(){
		if($this->login_model->check_username($this->input->post('username'))){
			echo 'taken';
		}
		else{
			echo 'available';
		}
	}

	public function check_email(){
		if($this->login_model->check_email($this->input->post('email'))){
			echo 'taken';
		}
		else{
			echo 'available';
		}
	}

}

 ?>