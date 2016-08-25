<?php 

	class Order extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('isLogged') == FALSE || $this->session->userdata('type') !='user'){
				redirect('main');
			}
			

		}

		public function payment(){
			if ($this->input->post()) {
				
				if($this->cart->total_items() > 0){
					$code = $this->order_model->new_order($this->cart->contents());
					$this->session->set_userdata(array('code' => $code));

				}
				else{
					$code = $this->session->userdata('code');
				}

				$data['code'] = $code;
				$data['background'] = base_url().'images/pihza.jpg';
				$data['page_title'] = 'Payment';
				$data['order'] = $this->db->get_where('orders', array('code' => $code))->row();
				$data['order_details'] = $this->order_model->get_order_detail($data['order']->code);
				$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('id' => $data['order']->restaurant_id))->row();


				$this->template->load('default','user/payment', $data);

				$this->cart->destroy();
			}else{
				redirect('user');
			}
			

		}

		public function find_driver($code){
			if($code != $this->session->userdata('code')){
				redirect('order/find_driver/'.$this->session->userdata('code'));
			}
			if($this->input->post('submit')){
				$credits = $this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits');
				if($this->input->post('payment') > $credits){
					redirect('user');
				}
				else{
					//update user's money
					$credits = $credits - $this->input->post('payment');
					$this->crud_model->update_data('users',array('credits' => $credits),array('id' => $this->session->userdata('user_id')));

					$data_order = array(
							'status' => 1,
							'distance'			=> $this->input->post('distance'),
							'estimation_time'	=> $this->input->post('duration') + 15,
							'delivery_cost'		=> $this->input->post('cost')
						);
					//update order status
					$this->crud_model->update_data('orders',$data_order,array('code' => $code));

					//update userdata
					$this->session->set_userdata(array('code' => $code,'order_status' => 1));

					//Get Restaurant ID For emailing drivers
					$data['order'] = $this->crud_model->get_by_condition('orders', array('code' => $code))->row();

					//Get Resto Info
					$restaurant_data = $this->db->get_where('restaurants', array('id' => $data['order']->restaurant_id))->row();
					//Email The Drivers
					$drivers  = $this->crud_model->get_data('drivers')->result();

					foreach ($drivers as $driver)
					{
						$emails[] = $driver->email;
					}

					$to = implode (", ", $emails); 

					//Emailing the drivers check *email model*
					$this->email_model->send_order($to, $restaurant_data);
					
					
				
					$data['background'] = base_url().'images/pihza.jpg';
					$data['page_title'] = 'Payment';
				

					$this->template->load('default_ordering','user/find_driver', $data);

				}
			}else if($this->session->userdata('order_status') == 1){

				$data['order'] = $this->crud_model->get_by_condition('orders', array('code' => $code))->row();
				$data['background'] = base_url().'images/pihza.jpg';
				$data['page_title'] = 'Waiting for Driver';
			

				$this->template->load('default_ordering','user/find_driver', $data);
			}else{
				redirect('user');
			}
			

		}

		//Ajax
		public function tracking ($code)
		{
			$status = $this->db->get_where('orders', array('code' => $code))->row()->status;
			$this->session->set_userdata('order_status',$status);
			echo $status;
		}

		public function driver_found($code){
			$data['page_title'] = 'Driver Information';
			$data['order'] = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();	
			if($data['order']->driver_id == 0){
				redirect('user');
			}
			$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $data['order']->driver_id))->row();
			$data['background'] = base_url().'images/pihza.jpg';
			$this->template->load('default_ordering','user/driver_found',$data);

		}


	}
 ?>