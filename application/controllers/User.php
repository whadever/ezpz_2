<?php 

class User extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE ){
			
			redirect('main');	
		
		}
		else if($this->session->userdata('isVerified') == 0){
			redirect('login/verify_account/'.$this->session->userdata('username'));

		}else if($this->session->userdata('type') != 'user'){

			redirect($this->session->userdata('type'));
			
		}

		else if($this->session->userdata('order_status') == 1 ){
			redirect('order/find_driver/'.$this->session->userdata('code'));
		}
		else if( $this->session->userdata('order_status') > 1 && $this->session->userdata('order_status') < 4){
			redirect('order/driver_found/'.$this->session->userdata('code'));
		}
		date_default_timezone_set('NZ');




	}

	public function index(){
		
		$data['page_title'] = 'Home';
		$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['background'] = base_url()."images/pihza.jpg";
		$this->template->load('default','user/home',$data);

	}

	public function profile($id=''){
		if($id != $this->session->userdata('user_id')){
			redirect('user');
		}
		
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['page_title'] = 'Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['user'] = $this->crud_model->get_by_condition('users',array('id' => $id))->row();
		$data['order_history'] = $this->crud_model->get_order_history($id)->result();
		$this->template->load('default','user/profile', $data);
	}

	public function edit_profile($id = ''){
		if($id != $this->session->userdata('user_id')){
			redirect('user');
		}
		
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['page_title'] = 'Edit Profile';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['user'] = $this->crud_model->get_by_condition('users',array('id' => $id))->row();

		if($this->input->post('update')){
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
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
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
					'latitude'			=> $this->input->post('lat'),
					'longitude'			=> $this->input->post('lng'),
					'address' 			=> $this->input->post('address'),
					'photo'				=> $photo,
					);
            }
            

            $this->crud_model->update_data('users',$data_update,array('id' => $id));
			
			$this->session->set_flashdata('success', 'Profile has been updated');
			redirect('user/profile/'.$id);
		}
		
		$this->template->load('default','user/edit_profile',$data);

	}

	

	public function credits(){
		$data['background'] = base_url()."images/pihza.jpg";
		$data['lists'] = $this->crud_model->get_data('restaurants')->result();
		$data['page_title'] = "Credit Top Up";
		$data['user_email'] = $this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row()->email;
		$this->template->load('default','user/credits',$data);

	}

	public function send_mail(){
		$this->email_model->send_mail();
		redirect('user');
	}


	public function rate_driver($driver_id,$code){
		$this->crud_model->update_data('driver_rating', array('rating' => $this->input->post('rating')), array('driver_id' => $driver_id, 'code' => $code));
		$order = $this->crud_model->get_by_condition('orders', array('code' => $code))->row();

		$data_insert = array(
				'user_id' 			=> $order->user_id,
				'restaurant_id' 	=> $order->restaurant_id,
				'driver_id' 		=> $order->driver_id,
				'total_product' 	=> $order->total_product,
				'total_qty' 		=> $order->total_qty,
				'total_price' 		=> $order->total_price,
				'delivery_cost' 	=> $order->delivery_cost,
				'code' 				=> $order->code,
				'status' 			=> $order->status,
				'latitude' 			=> $order->latitude,
				'longitude' 		=> $order->longitude,
				'address' 			=> $order->address,
				'estimation_time' 	=> $order->estimation_time,
				'distance' 			=> $order->distance,
				'date'				=> $order->date
				

			);

		$this->crud_model->insert_data('order_history', $data_insert);
		$this->crud_model->delete_data('orders',array('code' => $code));
		$this->session->unset_userdata(array('order_status','order_id'));
	
	}

	public function topup ()
	{
		$this->stripe_model->pay();
		$this->session->set_flashdata('success', 'Top Up Success! Your Credits Are Now Topped Up');

		$credits = $this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits');

		$amount = $credits + $this->input->post('amount');

		$this->crud_model->update_data('users', array('credits' => $amount), array('id' => $this->session->userdata('user_id')));
		redirect('main');
	}

	public function order_detail($order_code){
		$data['page_title'] = 'Order Details';
		$data['background'] = base_url()."images/pihza.jpg";
		$data['order_detail'] = $this->order_model->get_order_detail($order_code);
		$this->template->load('default', 'user/order_detail', $data);
	}
	
	
}

 ?>