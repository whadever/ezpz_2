<?php 

class Admin extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('admin_isLogged') != 1){
			redirect('admin_login');
		}

	}

	public function index(){
		$this->template->load('default_admin','admin/home');

	}

	public function users(){
		$data['users'] = $this->admin_model->get_by_condition('users',array('is_verified' => 1))->result();

		$this->template->load('default_admin','admin/users/index',$data); 
	}

	public function drivers(){
		$data['drivers'] = $this->admin_model->get_by_condition('drivers',array('is_verified' => 1))->result();

		$this->template->load('default_admin','admin/drivers/index',$data); 
	}

	public function clients(){
		$data['clients'] = $this->admin_model->get_by_condition('restaurants',array('is_verified' => 1))->result();

		$this->template->load('default_admin','admin/clients/index',$data); 
	}

	public function loginEverywhere ($type = '', $id = '')
		{
			switch ($type)
			{	
				case 'user':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user = $this->admin_model->get_by_condition('users', array('id' => $id))->row();
						
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
								'type'			=> 'user'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main');
					}
				}break;

				case 'driver':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user = $this->admin_model->get_by_condition('drivers', array('id' => $id))->row();
						
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
								'type'			=> 'driver'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main/');
					}
				}break;

				case 'client':
				{
					if($id == '')
					{
						redirect('admin');
					}else
					{
						$data_user = $this->admin_model->get_by_condition('restaurants', array('id' => $id))->row();

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
								'type'			=> 'client'
								
							);
						$this->session->set_userdata($session_user);
						redirect('main/');
					}
				}break;

				default :
				{
					redirect ('admin');
				}
			}
		}





}
?>