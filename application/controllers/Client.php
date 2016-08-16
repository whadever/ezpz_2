<?php 

class Client extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}else if($this->session->userdata('type') != 'client'){

			redirect($this->session->userdata('type'));
			
		}
		date_default_timezone_set('NZ');

	}

	public function index(){
		$this->load->helper('ezpz');
		$data['page_title'] = 'Client - Home';
		$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $this->session->userdata('user_id')))->row();

		$data['restaurant_time'] = $this->crud_model->get_by_condition('restaurant_time',array('restaurant_id' => $this->session->userdata('user_id') ))->result();

		$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $this->session->userdata('user_id')))->result();

		$data['background'] = base_url().$data['restaurant']->photo;
		$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();

		$data['comments'] = $this->restaurant_model->get_comments($this->session->userdata('user_id'));

		$this->template->load('default_client','client/home',$data);

	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}


		$data['page_title'] = 'Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['client'] = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
		$this->template->load('default_client','client/profile', $data);
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
                }

                $data = array(
						
						'name' 			=> $this->input->post('name'),
						'restaurant_id' => $this->session->userdata('user_id'),
						'price' 		=> $this->input->post('price'),
						'description' 	=> $this->input->post('description'),
						'photo' 		=> $photo,
						'available' 	=> 1
						
					);

                $this->db->insert('dishes', $data);
			}

			redirect('client/index');

	}

	public function edit_profile($id){
		if($id != $this->session->userdata('user_id')){
			redirect('client');
		}

		/*Set the Message*/
		$this->form_validation->set_message('is_unique','%s has been taken');

		/*Set the Rules*/
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|is_unique[drivers.username]|is_unique[restaurants.username]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|is_unique[drivers.email]|is_unique[restaurants.email]');
		
		if($this->form_validation->run() == FALSE){

			redirect('client');

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

}

 ?>