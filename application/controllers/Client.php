<?php 

class Client extends CI_Controller{

	public function index(){

		$data['page_title'] = 'Client';

		$this->template->load('default','client/home',$data);

	}

	public function register(){

		$data['page_title'] = 'Register';

		$this->template->load('default', 'client/register',$data);

	}

	public function submit(){

		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			$data['page_title'] = 'Register';

			$this->template->load('default', 'client/register',$data);

		}
		else{
			if($this->input->post('register')){
				$verification_code = verification_code();

				$verification_string = $this->input->post('username') . '~' . $verification_code;
					
					
					$config['allowed_types']        = 'jpg|png';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            
										
					$config['upload_path']          = 'uploads/user/' . $this->input->post('name');
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
					'password' 			=> hash_password($this->input->post('password')),
					'email' 			=> $this->input->post('email'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'verification_code'	=> $verification_code,
					'created'			=> date('Y-m-d')

					);
					
				$this->crud_model->insert_data('restaurants',$data);
				$this->email_model->verification_email($data['email'], $verification_string);
				$this->session->set_flashdata('success', 'Client has been added');

				redirect('login');
			}
			else{
				redirect('client/register');
			}
		}
	}

}

 ?>