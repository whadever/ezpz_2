<?php 

class Admin extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('admin_isLogged') != 1){
			redirect('admin_login');
		}
		date_default_timezone_set('NZ');
	}

	/* admin home */
	public function index(){
		/* get all unapproved drivers */
		$data['unapproved_drivers'] = $this->crud_model->get_by_condition('drivers',array('is_verified' => 0))->result();
		/* get all unapproved clients */
		$data['unapproved_clients'] = $this->crud_model->get_by_condition('restaurants',array('is_verified' => 0))->result();
		/*get unverified users*/
		$data['unapproved_users'] = $this->crud_model->get_by_condition('users',array('is_verified' => 0))->result();

		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$this->template->load('default_admin','admin/home',$data);

	}

	public function delete(){
		if($this->input->post('delete')){
			if($this->input->post('account')=='user'){
				$this->crud_model->delete_data('users',array('id' => $this->input->post('id')));
			}
			elseif ($this->input->post('account')=='driver') {
				$this->crud_model->delete_data('drivers',array('id' => $this->input->post('id')));
			}
			else{
				$this->crud_model->delete_data('restaurants',array('id' => $this->input->post('id')));	
			}
	
		}
		redirect('admin');	
	}

	/* user list page */
	public function users($is_verified){
		$data['users'] = $this->crud_model->get_by_condition('users',array('is_verified' => $is_verified))->result();

		$this->template->load('default_admin','admin/users/index',$data); 
	}


	public function drivers($is_verified){
		
		$data['drivers'] = $this->crud_model->get_by_condition('drivers',array('is_verified' => $is_verified))->result();


		$this->template->load('default_admin','admin/drivers/index',$data); 
	}


	public function clients($is_verified){
		$data['clients'] = $this->crud_model->get_by_condition('restaurants',array('is_verified' => $is_verified))->result();


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
						$data_user = $this->crud_model->get_by_condition('users', array('id' => $id))->row();
						
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
								'isVerified'	=> $data_user->is_verified,
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
						$data_user = $this->crud_model->get_by_condition('drivers', array('id' => $id))->row();
						
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
								'isVerified'	=> $data_user->is_verified,
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
						$data_user = $this->crud_model->get_by_condition('restaurants', array('id' => $id))->row();

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


	public function approve_driver($id){
		$random_code = random_string('numeric', 5);
		$password = hash_password($random_code);
		$this->crud_model->update_data('drivers',array('is_verified' => 1,'password' => $password), array('id' => $id));

		$this->session->set_flashdata('password', $random_code);
		#redirect('admin');
		echo "success";


	}

	public function approve_all_driver(){
		$random_code = random_string('numeric', 5);
		$password = hash_password($random_code);
		$this->crud_model->update_data('drivers',array('is_verified' => 1,'password' => $password), array('is_verified' => 0));

		$this->session->set_flashdata('password', $random_code);
		redirect('admin/drivers/0');


	}

	public function approve_all_client(){
		$random_code = random_string('numeric', 5);
		$password = hash_password($random_code);
		$this->crud_model->update_data('restaurants',array('is_verified' => 1,'password' => $password), array('is_verified' => 0));

		$this->session->set_flashdata('password', $random_code);
		redirect('admin/drivers/0');


	}

	public function approve_client($id){
		$random_code = random_string('numeric', 5);
		$password = hash_password($random_code);
		$this->crud_model->update_data('restaurants',array('is_verified' => 1,'password' => $password), array('id' => $id));

		$this->session->set_flashdata('password', $random_code);
		// redirect('admin');
		echo "success";

	}

	public function cuisines(){
		$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();

		$this->template->load('default_admin','admin/cuisines/index',$data); 
	}

	public function add_cuisine(){
		if($this->input->post('submit')){

			$config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2000;
            // $config['max_width']            = 1000;
            // $config['max_height']           = 768;

            
								
			$config['upload_path']          = 'images/cuisines';
			$config['overwrite']			= False;
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
                $photo = $config ['upload_path'] . '/' . $image['file_name'];
            }

			//image_moo
			$this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(350,250)
				->save_pa('','_thumb');

			$this->image_moo
			->load($config ['upload_path'] . '/' . $image['file_name'])
			->resize_crop(1300,700)
			->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

			$data = array(

				'name'	=> $this->input->post('name'),
				'photo' => $photo,
				'thumb' => $config ['upload_path'] . '/' . $image['raw_name'].'_thumb'.$image['file_ext']

				);

			$this->crud_model->insert_data('cuisines',$data);

			redirect('admin/cuisines');
		}

		else{
			redirect('admin/cuisines');
		}
	}
//Manage Cuisine Update Delete
	public function edit_cuisine(){
		if($this->input->post('update')){
			$config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2000;	
            // $config['max_width']            = 1000;
            // $config['max_height']           = 768;

            
								
			$config['upload_path']          = 'images/cuisines';
			$config['overwrite']			= False;
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
                $photo = $config ['upload_path'] . '/' . $image['file_name'];
                			//image_moo
				$this->image_moo
					->load($config ['upload_path'] . '/' . $image['file_name'])
					->resize_crop(350,250)
					->save_pa('','_thumb');

				$this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(1300,700)
				->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

				$thumb = $config ['upload_path'] . '/' . $image['raw_name'].'_thumb'.$image['file_ext'];
            }
            else{
            	$photo= $this->crud_model->get_by_condition('cuisines',array('id' => $this->input->post('id')))->row('photo');
            	$thumb= $this->crud_model->get_by_condition('cuisines',array('id' => $this->input->post('id')))->row('thumb');
            }

			$data = array(
				'id'	=> $this->input->post('id'),
				'name'	=> $this->input->post('name'),
				'photo' => $photo,
				'thumb' => $thumb

			);
			$this->crud_model->update_data('cuisines',$data,array('id' => $data['id']));

			redirect('admin/cuisines');
		}	
	}

	public function delete_cuisine(){
		if($this->input->post('delete')){

			$cuisine = $this->crud_model->get_by_condition('cuisines',array('id' => $this->input->post('id')))->row();

			unlink($cuisine->photo);
			unlink($cuisine->thumb);

			$this->crud_model->delete_data('cuisines',array('id' => $this->input->post('id')));
	
		}

		redirect('admin/cuisines');
		
	}

//Manage User Update Delete
	public function edit_user(){
		if($this->input->post('update')){
			$data = array(
				'id'	=> $this->input->post('id'),
				'username'	=> $this->input->post('name'),
				'email' 	=> $this->input->post('email'),
				'telephone' => $this->input->post('phone')

			);
			$this->crud_model->update_data('users',$data,array('id' => $data['id']));

			redirect('admin/users');
		}	
	}

	public function delete_user(){
		if($this->input->post('delete')){
			$this->crud_model->delete_data('users',array('id' => $this->input->post('id')));
	
		}
		redirect('admin/users');
	}


//Manage Client/Restaurant Update Delete
	public function edit_client(){
		if($this->input->post('update')){
			$data = array(
				'id'	=> $this->input->post('id'),
				'name'	=> $this->input->post('name'),
				'email' 	=> $this->input->post('email'),
				'telephone' => $this->input->post('phone')

			);
			$this->crud_model->update_data('restaurants',$data,array('id' => $data['id']));
			redirect('admin/clients/1');
		}	
	}
	public function delete_client(){
		if($this->input->post('delete')){
			$this->crud_model->delete_data('restaurants',array('id' => $this->input->post('id')));
		}
		redirect('admin/clients/1');
	}

//Manage Settings
	public function edit_background(){	
		
			$config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;	
            // $config['max_width']            = 1000;
            // $config['max_height']           = 768;

            
								
			$config['upload_path']          = 'uploads/config';
			$config['overwrite']			= True;
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
                $photo = $config ['upload_path'] . '/' . $image['file_name'];
                			//image_moo

				$this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(1300,700)
				->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

				$data = array(
				'background' => $photo,

				);
				$this->crud_model->update_data('configuration',$data,array('id' => 1));
				echo "success";
            }
            else{
            	echo $this->upload->display_errors();
     
            }

			
			
			// redirect('admin');
		}

	public function edit_color(){
		if($this->input->post()){

			$data = array(

					'primary_color' => '#'.$this->input->post('color')

				);

			$this->crud_model->update_data('configuration', $data, array('id' => 1));

			echo 'success';
		}
		else{
			echo 'failed';
		}
	}

	public function edit_fare(){
		if($this->input->post()){
			$data = array(

					'service_fare' => $this->input->post('fare')

				);
			$this->crud_model->update_data('configuration',$data, array('id' => 1));
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}	

}
?>
