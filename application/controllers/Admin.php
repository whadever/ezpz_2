<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller{

		public function index(){

				if(!$this->session->userdata('admin_isLogged'))
				{
					$data['page_title'] = 'Login Admin';
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/login', $data);
				}else
				{
					$data['page_title'] = 'Admin Dashboard';
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/dashboard', $data);
				}

			$this->load->view('admin/template/footer');
		}
		
		public function login ()
		{
			if($this->input->post())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('admin_model');
				$data_username = array('username'  => $username);
				if(!$data_user = $this->admin_model->getUserdata($data_username))
				{
					$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 1)');
					redirect('admin/');
				}else
				{
					if(password_verify($password, $data_user->password))
					{
						$session_user = array (

							'admin_isLogged'		=> True,
							'admin_username'		=> $username

							);

						$this->session->set_userdata($session_user);

						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Username or Password is Wrong (debug 2)');
						redirect('admin/');
					}
				}

			}else
			{
				redirect('admin/');
			}
		}

		public function forget ($param1 = 'forget')
		{
			if($param1 == 'forget')
			{
				$data['page_title'] = 'Reset Admin Password';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/forget', $data);
				$this->load->view('admin/template/footer', $data);
			}else if($param1 == 'reset')
			{
				$email = $this->input->post('email');
				$new_pass = substr(md5(microtime()),rand(0,26),5);
				$this->load->model('login_model');

				$user_data = array('email' => $email);

				if($this->login_model->getUserdata($user_data))
				{
					$data = array (

					'password'  => $new_pass

					);

					if($this->login_model->resetPassword($email, $data))
					{
						$this->session->set_flashdata('success', 'Reset Password Success! Please Check Your Email!');
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Email not sent!');
						redirect('admin/');
					}
				}else
				{
					$this->session->set_flashdata('error', 'No Account Registered With That Email!');
					redirect('admin/');
				}
			}
		}

		public function users ($type = '',$id = '')
		{
			$this->load->model('admin_model');

			switch ($type)
			{
				case 'user':
				{
					if($id == '')
					{
						$users = $this->admin_model->getUsers($type);
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'Reset Admin Password';
						$this->load->view('admin/template/header', $data);
						$this->load->view('admin/view_users', $data);
						$this->load->view('admin/template/footer', $data);
					}else
					{
						$data_user = $this->admin_model->getUsers($type, $id);

						//Check if user have completed their data
							if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo == NULL)
							{
								$complete = False;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->firstname .' '. $data_user->lastname,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'is_verified'	=> $data_user->is_verified,
								'isLogged'		=> TRUE,
								'type'			=> 'driver'
								
							);
						$this->session->set_userdata($session_user);
						redirect('dashboard/');
					}
				}break;

				case 'driver':
				{
					if($id == '')
					{
						$users = $this->admin_model->getUsers($type);
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'Reset Admin Password';
						$this->load->view('admin/template/header', $data);
						$this->load->view('admin/view_users', $data);
						$this->load->view('admin/template/footer', $data);
					}else
					{
						$data_user  = $this->admin_model->getUsers($type, $id);
						
						//Check if user have completed their data
							if($data_user->firstname == NULL && $data_user->lastname == NULL && $data_user->photo_front == NULL && $data_user->photo_back == NULL)
							{
								$complete = FALSE;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->firstname .' '. $data_user->lastname,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'is_verified'	=> $data_user->is_verified,
								'isLogged'		=> TRUE,
								'type'			=> 'user'
								
							);
						$this->session->set_userdata($session_user);
						redirect('dashboard/');
					}
				}break;

				case 'client':
				{
					if($id == '')
					{
						$users = $this->admin_model->getUsers('restaurants');
						$data['users'] = $users;
						$data['type']= $type;
						$data['page_title'] = 'Reset Admin Password';
						$this->load->view('admin/template/header', $data);
						$this->load->view('admin/view_users', $data);
						$this->load->view('admin/template/footer', $data);
					}else
					{
						$data_user = $this->admin_model->getUsers('restaurants', $id);

						//Check if user have completed their data
							if($data_user->name == NULL && $data_user->address == NULL && $data_user->opentime == NULL && $data_user->closetime == NULL && $data_user->opendays == NULL && $data_user->longitude == NULL  && $data_user->latitude == NULL && $data_user->photo == NULL  && $data_user->phone == NULL)
							{
								$complete = FALSE;
							}else
							{
								$complete = True;
							}

						$session_user 	= array (

								'username'		=> $data_user->username,
								'name'			=> $data_user->name,
								'user_id'		=> $data_user->id,
								'data_complete'	=> $complete,
								'isLogged'		=> TRUE,
								'type'			=> 'clients'
								
							);
						$this->session->set_userdata($session_user);
						redirect('dashboard/');
					}
				}break;

				default:
				{
					redirect('/admin');
				}break;
			}
		}

		public function clients($param1 = 'new')
		{
			if(!$this->session->userdata('admin_isLogged'))
				{
					redirect('admin/');
				}

			if($param1 == 'new')
			{
				$data['page_title'] = 'New Client Account';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/new_client', $data);
				$this->load->view('admin/template/footer', $data);
			}else if($param1 == 'submit')
			{
				if($this->input->post())
				{
					$username 	= $this->input->post('username');
					$email 		= $this->input->post('email');
					$password 	= substr(md5(microtime()),rand(0,26),5);

					$data 		= array (

						'username'	=> $username,
						'email'		=> $email,
						'password'	=> $password,
						'created'	=> date('Y-m-d')

						);

					$this->load->model('admin_model');
					if($this->admin_model->createNewClient($data))
					{
						$this->session->set_flashdata('success', 'Create New Client Succeded!');
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Create New Client Failed!');
						redirect('admin/');
					}

				}else
				{
					redirect('admin/');
				}
			}else
			{
				redirect('admin/');
			}
		}

		public function see_as($param1 = '')
		{
			if(!$this->session->userdata('admin_isLogged'))
				{
					redirect('admin/');
				}

		}

		public function logout()
		{
			session_destroy();
			redirect('main');
		}

		//For Creating a new Admin
		public function create_new ($param1 ='')
		{
			if($param1 == '')
			{
				$data['page_title'] = 'Create New Admin';
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/new', $data);
				$this->load->view('admin/template/footer', $data);
			}else if($param1 == 'submit')
			{
				if($this->input->post())
				{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');

					$data = array (

						'username'		=> $username,
						'password'		=> password_hash($password, PASSWORD_BCRYPT),
						'email'			=> $email,
						'created'		=> date('Y-m-d')

						);

					$this->load->model('admin_model');
					if($this->admin_model->newAdmin($data))
					{
						$this->session->set_flashdata('success', 'Create Success!');
						redirect('admin/');
					}else
					{
						$this->session->set_flashdata('error', 'Create error!');
						redirect('admin/');
					}

				}else
				{
					redirect('admin/');
				}
			}else
			{
				redirect('/admin');
			}
		}

	}

 ?>