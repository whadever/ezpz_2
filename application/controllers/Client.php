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

		$data['restaurant_time'] = $this->crud_model->get_by_condition('restaurant_time',array('day' => date('l'),'restaurant_id' => $this->session->userdata('user_id') ))->row();

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

}

 ?>