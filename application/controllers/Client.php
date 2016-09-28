<?php 

class Client extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}elseif($this->session->userdata('type') != 'client'){

			redirect($this->session->userdata('type'));
			
		}
		date_default_timezone_set('NZ');

	}

	public function index(){
		$this->load->helper('ezpz');
		$data['page_title'] = 'Client - Home';
		$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $this->session->userdata('user_id')))->row();

		$data['restaurant_time'] = $this->crud_model->get_by_condition('restaurant_time',array('restaurant_id' => $this->session->userdata('user_id') ))->result_array();

		$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $this->session->userdata('user_id')))->result();

		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] =$data['restaurant']->photo;
		$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();

		$data['days'] = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

		$data['comments'] = $this->restaurant_model->get_comments($this->session->userdata('user_id'));

		$this->template->load('default_client','client/home',$data);

	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}


		$data['page_title'] = 'Profile';
		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] = $data['restaurant']->photo;
		$data['client'] = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
		$this->template->load('default_client','client/profile', $data);
	}

	public function change_password($id = ''){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}
		if($this->input->post()){

			$client = $this->crud_model->get_by_condition('restaurants',array('id' => $id, 'password' => hash_password($this->input->post('old_password'))))->row();

			if($client != ''){

				$password = hash_password($this->input->post('password'));

				$data_update = array(
						'password' => $password

					);

				$this->crud_model->update_data('restaurants',$data_update,array('id' => $id));

				echo 'success';
			}
		
			else{

				echo 'failed';
			}
		}else{
			redirect('client');
		}

	}

	public function menu($id=''){
		$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $this->session->userdata('user_id')))->row();
		$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $this->session->userdata('user_id')))->result();
		$data['page_title'] = 'Menu';
		$data['configuration'] = $this->crud_model->get_data('configuration')->row();
		$data['background'] = $data['restaurant']->photo;
		$data['client'] = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
		$this->template->load('default_client','client/menu', $data);
	}

	public function add_menu(){
		if($this->input->post('submit')){

				$config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 5000;
	            // $config['max_width']            = 1000;
	            // $config['max_height']           = 768;
	           
									
				$config['upload_path']          = 'uploads/restaurant/' . $this->session->userdata('username').'/dishes';
				$config['overwrite']			= True;
				#$config['file_name']			= 'photo.jpg';
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
                    $photo = $this->upload->data();

                    $photo = $config ['upload_path'] . '/' . $photo ['file_name'];
                    
                }else
                {
                	
                	echo '<pre>';
                	print_r ($this->upload->display_errors());
                	echo '</pre>';
                	exit;
                }

                $data = array(
						
						'name' 			=> $this->input->post('name'),
						'restaurant_id' => $this->session->userdata('user_id'),
						'price' 		=> number_format($this->input->post('price'),2),
						'description' 	=> $this->input->post('description'),
						'photo' 		=> $photo,
						'available' 	=> 1
						
					);

                $this->db->insert('dishes', $data);
			}

			redirect('client/menu/'.$this->session->userdata('user_id'));

	}

	public function edit_menu(){
		if($this->input->post('update')){
			$config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 5000;
			$config['upload_path']          = 'uploads/restaurant/' .$this->session->userdata('username').'/dishes';
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
                //Get the link for the database
                $photo = $this->upload->data();
                $photo = $config['upload_path'] . '/' . $photo['file_name'];


            }

            else{
            	$photo= $this->crud_model->get_by_condition('dishes',array('id' => $this->input->post('id')))->row('photo');
            }

            $data = array(	
            			'id'			=>$this->input->post('id'),
						'name'			=> $this->input->post('name'),
						'price' 		=> number_format($this->input->post('price'),2),
						'description' 	=> $this->input->post('description'),
						'photo' 		=> $photo,
						'available' 	=> 1
						
					);

			$this->crud_model->update_data('dishes',$data,array('id' => $data['id']));
		}
		redirect('client/menu/'.$this->session->userdata('user_id'));
	}

	public function delete_menu(){
		$id = $this->input->post('id');
		$dish = $this->crud_model->get_by_condition('dishes',array('id' => $id))->row();
		unlink($dish->photo);
		$this->crud_model->delete_data('dishes',array('id' => $id));
		redirect('client/menu/'.$this->session->userdata('user_id'));
	}

	public function edit_profile($id){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}


		if($this->input->post('update')){

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

            if($this->upload->do_upload('photo'))
            {
                //Get the link for the database
                $image = $this->upload->data();
                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
                $this->image_moo
					->load($photo)
					->resize_crop(1900,700)
					->save($photo,TRUE);
            }else{
            	$photo = $this->crud_model->get_by_condition('restaurants',array('id' => $this->session->userdata('user_id')))->row('photo');
            }



			$data = array(
			
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
			$this->crud_model->update_data('restaurants',$data,array('id' => $id));
			$restaurant_id = $this->crud_model->get_by_condition('restaurants',array('username' => $this->input->post('username')))->row('id');

			$this->crud_model->delete_data('restaurant_time',array('restaurant_id' => $id));

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
						'restaurant_id' => $id
					);
				
				$this->crud_model->insert_data('restaurant_time',$data_insert);
			}	
			
			$this->session->set_flashdata('success', 'swal("Success","Profile has been updated","success")');

			redirect('client');
	 	}
	 	
		 


	}

}

 ?>