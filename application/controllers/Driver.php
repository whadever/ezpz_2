<?php 

class Driver extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'driver'){

			redirect($this->session->userdata('type'));
			
		}
		
		
		date_default_timezone_set('NZ');
	}

	public function index(){

		if($this->session->userdata('order_status') > 1 && $this->session->userdata('order_status') < 4){
			redirect('driver/accept_order/'.$this->session->userdata('order_id'));
		}
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['orders'] = $this->order_model->get_orders();

		$this->template->load('default_driver','driver/home',$data);

	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('driver');
		}


		$data['page_title'] = 'Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $id))->row();
		$this->template->load('default_driver','driver/profile', $data);
	}

	public function edit_profile($id = ''){
		if($id != $this->session->userdata('user_id')){
			redirect('driver');
		}
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['page_title'] = 'Edit Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['user'] = $this->crud_model->get_by_condition('drivers',array('id' => $id))->row();

		if($this->input->post('update')){
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

            if ($this->upload->do_upload('photo'))
            {
                //Get the link for the database
                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
            }else{
           		$photo = $data['user']->photo;
            }

            if($this->input->post('email') != $data['user']->email){
            	$verification_code = verification_code();

				$verification_string = $this->input->post('username') . '~' . $verification_code;

            	$data_update = array(

					'username' 			=> $this->input->post('username'),
					'firstname'			=> $this->input->post('firstname'),
					'lastname'			=> $this->input->post('lastname'),
					'email' 			=> $this->input->post('email'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'ird'	 			=> $this->input->post('ird'),
					'driver_license' 	=> $this->input->post('driver_license'),
					'license_type' 		=> $this->input->post('license_type'),	
					'photo'				=> $photo,
					'verification_code'	=> $verification_code,
					'is_verified'		=> 0
					

					); 
            	$this->email_model->verification_email($data_update['email'], $verification_string);
            	$this->session->sess_destroy();
            	
            }else{
            	$data_update = array(

					'username' 			=> $this->input->post('username'),
					'firstname'			=> $this->input->post('firstname'),
					'lastname'			=> $this->input->post('lastname'),
					'email' 			=> $this->input->post('email'),
					'telephone' 		=> $this->input->post('telephone'),
					'address' 			=> $this->input->post('address'),
					'ird'	 			=> $this->input->post('ird'),
					'driver_license' 	=> $this->input->post('driver_license'),
					'license_type' 		=> $this->input->post('license_type'),	
					'photo'				=> $photo,
					);
            }
            
            
   			$this->crud_model->update_data('drivers',$data_update,array('id' => $id));
			
			$this->session->set_flashdata('success', 'Profile has been updated');
			redirect('driver/profile/'.$id);
		}
		
		$this->template->load('default_driver','driver/edit_profile',$data);

	}

	public function accept_order($order_id){
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
			$driver_id = $this->session->userdata('user_id');

			$this->db->where('id',$order_id);
			$this->db->update('orders',array('driver_id' => $driver_id, 'status' => 2));
			
			$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $driver_id))->row();
			$data['order'] = $this->crud_model->get_by_condition('orders',array('id' => $order_id))->row();
			$data['order_detail'] = $this->order_model->get_order_detail($order_id);
			$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $data['order']->restaurant_id))->row();
			
			$this->template->load('default_driver', 'driver/direction_to_restaurant', $data);
		}


}

 ?>