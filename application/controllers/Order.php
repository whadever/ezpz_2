<?php 

	class Order extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('isLogged') == FALSE){
				redirect('main');
			}
			elseif($this->session->userdata('isVerified') == 0){
				redirect('login/verify_account/'.$this->session->userdata('username'));

			}elseif($this->session->userdata('type') !='user'){
				redirect($this->session->userdata('type'));
			}
			

		}

		public function payment(){
			if ($this->input->post()) {
				
				if($this->cart->total_items() > 0){
					if($this->crud_model->get_by_condition('orders', array('user_id' => $this->session->userdata('user_id')))->num_rows()>0)
					{
						//Delete Old Order
						$code = $this->crud_model->get_by_condition('orders', array('user_id' => $this->session->userdata('user_id')))->row()->code;
						$this->crud_model->delete_data('orders', array('user_id' => $this->session->userdata('user_id')));
						$this->crud_model->delete_data('order_detail', array('code' => $code));

						//Make The New Order
						$code = $this->order_model->new_order($this->cart->contents());
						$this->session->set_userdata(array('code' => $code));
					}else
					{
						$code = $this->order_model->new_order($this->cart->contents());
						$this->session->set_userdata(array('code' => $code));
					}

				}
				else{
					$code = $this->session->userdata('code');
				}

				$data['code'] = $code;
				$data['configuration'] = $this->crud_model->get_data('configuration')->row();
				$data['background'] = $data['configuration']->background;

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
			if($this->input->post()){
				$credits = $this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits');
				if($this->input->post('payment') > $credits){
					echo "failed";
					// redirect('user');
				}
				else{
					//update user's money
					$credits = $credits - $this->input->post('payment');
					$this->crud_model->update_data('users',array('credits' => $credits),array('id' => $this->session->userdata('user_id')));

					//minimum fare is $5;
					$delivery_cost = $this->input->post('cost') > 5 ? $this->input->post('cost') : 5;

					$data_order = array(
							'status' => 1,
							'distance'			=> $this->input->post('distance'),
							'estimation_time'	=> $this->input->post('duration') + 15,
							'delivery_cost'		=> $delivery_cost
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
					
					echo "success";	


				
					// $data['background'] = base_url().'images/pihza.jpg';
					// $data['page_title'] = 'Payment';
				
					// $this->template->load('default_ordering','user/find_driver', $data);

				}
			}elseif($this->session->userdata('order_status') == 1){
				
				$data['order'] = $this->crud_model->get_by_condition('orders', array('code' => $code))->row();
				$data['configuration'] = $this->crud_model->get_data('configuration')->row();
				$data['background'] = $data['configuration']->background;

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
			if($status == 4){
				$this->session->set_userdata('rating', 0);
			}
			echo $status;
		}

		public function driver_found($code){
			$data['page_title'] = 'Driver Information';
			$data['order'] = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();	
			if($data['order']->driver_id == 0){
				redirect('user');
			}
			$data['driver'] = $this->crud_model->get_by_condition('drivers',array('id' => $data['order']->driver_id))->row();
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$data['background'] = $data['configuration']->background;

			$this->template->load('default_ordering','user/driver_found',$data);

		}


		public function cancel_order($code){
			$order = $this->crud_model->get_by_condition('orders',array('code' => $code))->row();
			$user_id = $this->session->userdata('user_id');

			if($order->status == 1){
				$user = $this->crud_model->get_by_condition('users', array('id' => $user_id))->row();

				$this->crud_model->update_data('users', array('credits' => $user->credits + $order->delivery_cost + $order->total_price),array('id' => $user_id));

				$this->crud_model->delete_data('orders',array('code' => $code));
				$this->session->unset_userdata(array('order_status','code'));
				$this->session->set_flashdata('success_topup','swal({   title: "Success",   text: "Your Order has been cancelled!", type: "success", showConfirmButton: false, timer:1500 });');
			}
			
			redirect('user');
		}


	}
 ?>