<?php 

	class Order extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('isLogged') == FALSE || $this->session->userdata('type') !='user'){
				redirect('main');
			}

		}

		public function search_driver(){
			if($this->cart->total_items() > 0){
				$order_id = $this->order_model->new_order($this->cart->contents());
				$this->session->set_userdata(array('order_id' => $order_id));
			}
			else{
				$order_id = $this->session->userdata('order_id');
			}

			$data['order_id'] = $order_id;
			$data['background'] = base_url().'images/pihza.jpg';
			$data['page_title'] = 'Order';
			$data['order'] = $this->db->get_where('orders', array('id' => $order_id))->row();


			$this->template->load('default','user/find_driver', $data);

			$this->cart->destroy();

		}

		public function tracking ($order_id)
		{
			$status = $this->db->get_where('orders', array('id' => $order_id))->row()->status;
			echo $status;
		}

		public function driver_found(){
			$this->load->view('user/driver_found');
		}


	}
 ?>