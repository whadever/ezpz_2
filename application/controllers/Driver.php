<?php 

class Driver extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('isLogged') == FALSE){
			
			redirect('main');	
		
		}elseif($this->session->userdata('type') != 'driver'){

			redirect($this->session->userdata('type'));
			
		}

		
		
		date_default_timezone_set('NZ');
	}

	public function index(){

		
		if($this->session->userdata('order_status') == 2 ){
			redirect('driver/accept_order/'.$this->session->userdata('code'));
		}
		elseif($this->session->userdata('order_status') == 3 ){
			redirect('driver/delivery/'.$this->session->userdata('code'));
		}elseif($this->session->userdata('paid')){
			redirect('driver/waiting_payment/'.$this->session->userdata('code'));
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
		$data['order_history'] = $this->driver_model->get_order_history($id)->result();
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

	public function accept_order($code){
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
		$driver_id = $this->session->userdata('user_id');

		$this->db->where('code',$code);
		$this->db->update('orders',array('driver_id' => $driver_id, 'status' => 2));
		$this->session->set_userdata(array('order_status' => 2));
		$this->session->set_userdata(array('code' => $code));
		
		$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $driver_id))->row();
		$data['order'] = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();
		$data['order_detail'] = $this->order_model->get_order_detail($code);
		$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $data['order']->restaurant_id))->row();
		$data['customer'] = $this->crud_model->get_by_condition('users',array('id' => $data['order']->user_id))->row();
			
		$this->template->load('default_driver', 'driver/direction_to_restaurant', $data);
		}

	public function delivery($code){
		$data['page_title'] = 'Driver';
		$data['background'] = base_url()."images/pihza.jpg";
		$driver_id = $this->session->userdata('user_id');

		$this->db->where('code',$code);
		$this->db->update('orders',array('driver_id' => $driver_id, 'status' => 3));
		$this->session->set_userdata(array('order_status' => 3));
		
		$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $driver_id))->row();
		$data['order'] = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();
		$data['order_detail'] = $this->order_model->get_order_detail($code);
		$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $data['order']->restaurant_id))->row();
		$data['customer'] = $this->crud_model->get_by_condition('users',array('id' => $data['order']->user_id))->row();
			
		$this->template->load('default_driver', 'driver/direction_to_customer', $data);

	}

	//Ajax
	public function tracking ($code)
	{
		$rate = $this->db->get_where('driver_rating', array('code' => $code))->row()->rating;
		
		echo $rate;
	}

	public function waiting_payment($code){
		$data['page_title'] = 'Waiting Payment';
		$data['background'] = base_url()."images/pihza.jpg";

		$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $this->session->userdata('user_id')))->row();
		$data['order'] = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();
		$data['order_detail'] = $this->order_model->get_order_detail($code);

		
		//$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $data['order']->restaurant_id))->row();
		//$data['customer'] = $this->crud_model->get_by_condition('users',array('id' => $data['order']->user_id))->row();

		$this->db->where('code',$code);
		$this->db->update('orders',array('driver_id' => $this->session->userdata('user_id'), 'status' => 4));

		
		$this->session->set_userdata('paid' , 0);
		$data_rating = array(
				'code' => $code,
				'driver_id' => $this->session->userdata('user_id'),
				'user_id' => $data['order']->user_id

			);

		$this->crud_model->insert_data('driver_rating',$data_rating);

		

		$this->template->load('default_driver', 'driver/waiting_payment', $data);
	}

	public function finish_order($code){
		$driver_id = $this->session->userdata('user_id');
		$driver = $this->crud_model->get_by_condition('drivers',array('id' => $driver_id))->row();
		$user_id = $this->crud_model->get_by_condition('order_history',array('code' => $code))->row('user_id');	

		$this->session->unset_userdata(array('order_status','code'));
		$this->session->unset_userdata(array('paid'));

		$order = $this->crud_model->get_by_condition('order_history',array('code' => $code))->row();

		$driver_earnings = number_format($order->delivery_cost * 70 / 100 - ($order->delivery_cost * 70/100 * 20/100),2);
		$ezpz_earnings = number_format($order->delivery_cost - ($order->delivery_cost * 70 / 100 - ($order->delivery_cost * 70/100 * 20/100)),2);

		$driver_credits = $driver_earnings + $order->total_price;

		$this->crud_model->update_data('drivers',array('credits' => $driver->credits + $driver_credits), array('id' => $driver_id));

		$transaction_data = array (

			'code'				=> $code,
			'driver_id'			=> $driver_id,
			'driver_earnings'	=> $driver_earnings,
			'ezpz_earnings'		=> $ezpz_earnings

			);

		$this->crud_model->insert_data('transaction', $transaction_data);
		

		redirect('driver');
	}


	public function credits(){
		$data['background'] = base_url()."images/pihza.jpg";
	
		$data['page_title'] = "Credit Top Up";
		$data['driver_email'] = $this->crud_model->get_by_condition('drivers', array('id' => $this->session->userdata('user_id')))->row()->email;
		$this->template->load('default_driver','driver/credits',$data);

	}

	public function topup ()
	{
		$this->stripe_model->pay();
		$this->session->set_flashdata('success', 'Top Up Success! Your Credits Are Now Topped Up');

		$credits = $this->crud_model->get_by_condition('drivers', array('id' => $this->session->userdata('user_id')))->row('credits');

		$amount = $credits + $this->input->post('amount');

		$this->crud_model->update_data('drivers', array('credits' => $amount), array('id' => $this->session->userdata('user_id')));
		redirect('driver');
	}

	public function order_history($id){
		if($id != $this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
		}

		$data['background'] = base_url()."images/pihza.jpg";	
		$data['page_title'] = "Order History";

		$data['order_history'] = $this->driver_model->get_order_history($id)->result();

		$this->template->load('default_driver','driver/order_history',$data);
	}

	public function my_earnings($id,$param1='monthly'){
		if($id != $this->session->userdata('user_id')){
			$id = $this->session->userdata('user_id');
		}

		//default
		if($param1 == 'monthly'){

			if($this->input->post()){
				
				

				$date = $this->input->post('year').'-'.$this->input->post('month');
			
				$data['earnings'] = $this->driver_model->get_earnings($id,$date)->result();

				$data['background'] = base_url()."images/pihza.jpg";	
				$data['page_title'] = "My Earnings";

				

				$this->template->load('default_driver','driver/earnings',$data);

			}else{

				$data['earnings'] = $this->driver_model->get_earnings($id,date('Y-m'))->result();

				$data['background'] = base_url()."images/pihza.jpg";	
				$data['page_title'] = "My Earnings";

				

				$this->template->load('default_driver','driver/earnings',$data);
			}
		}
		elseif($param1 == 'daily'){

			if($this->input->post()){


			}else{

				$data['earnings'] = $this->driver_model->get_earnings($id,date('Y-m-d'))->result();

				$data['background'] = base_url()."images/pihza.jpg";	
				$data['page_title'] = "My Earnings";

				

				$this->template->load('default_driver','driver/earnings',$data);
			}

		}
	}
}

 ?>