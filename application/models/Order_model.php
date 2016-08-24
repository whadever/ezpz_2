<?php 

class Order_model extends CI_Model{

	// public function new_order ($cart)
	// {
	// 	$orders = array(

	// 		'status'			=> 0,
	// 		'total_product'		=> count($cart),
	// 		'total_qty'			=> $this->cart->total_items(),
	// 		'total_price'		=> $this->cart->total(),
	// 		'user_id'			=> $this->session->userdata('user_id'),
	// 		'code'				=> substr(md5(microtime()),rand(0,26),5)

	// 		); 

	// 	//Put into order_history
	// 	$this->db->insert('order_history', $orders);

	// 	//Get order ID
	// 	$order_id = $this->db->get_where('order_history', array('code' => $orders['code']))->row()->id;

	// 	//Put into order_detail
	// 	foreach ($cart as $item)
	// 	{		
	// 		$data = array (

	// 			'order_id' 		=> $order_id,
	// 			'product_id'	=> $item['id'],
	// 			// 'options'		=> $item['options'],
	// 			'qty'			=> $item['qty'],
	// 			'sub_total'		=> $item['qty'] * $item['price'],

	// 			);

	// 		//Put into order_history
	// 		$this->db->insert('order_detail', $data);
	// 	}

	// 	//Get Restaurant ID For emailing drivers
	// 	$restaurant_id = $this->db->get_where('dishes', array('id' => $data['product_id']))->row()->restaurant_id;

	// 	//Get Resto Info
	// 	$restaurant_data = $this->db->get_where('restaurants', array('id' => $restaurant_id))->row();

	// 	//Email The Drivers
	// 	$drivers  = $this->crud_model->get_data('drivers')->result();

	// 	foreach ($drivers as $driver)
	// 	{
	// 		$emails[] = $driver->email;
	// 	}

	// 	$to = implode (", ", $emails); 

	// 	// //Emailing the drivers check *email model*
	// 	// $this->load->model('email_model');
	// 	// if($this->email_model->send_order($to, $restaurant_data))
	// 	// {
	// 	// 	//Return Order Id for later use
	// 	// 	return $order_id;
	// 	// }else
	// 	// {
	// 	// 	return 0;
	// 	// }
	// 	return $order_id;

	// }

	public function new_order ($cart)
	{
		
		do
		{
			$flag == 0;
			$code = substr(md5(microtime()),rand(0,26),5);
			if($this->db->get_where('order_history', array('code' => $code))->num_rows() > 0 || $this->db->get_where('orders', array('code' => $code))->num_rows() > 0)
			{
				$flag = 1;
			}
		}while($flag == 1);

		$orders = array(

			'user_id'			=> $this->session->userdata('user_id'),
			'restaurant_id' 	=> 0,
			'total_product'		=> count($cart),
			'total_qty'			=> $this->cart->total_items(),
			'total_price'		=> $this->cart->total(),
			'code'				=> $code,
			'status'			=> 0,
			'latitude'			=> $this->input->post('lat'),
			'longitude'			=> $this->input->post('lng'),
			'address'			=> $this->input->post('address'),

			); 

		//Put into order
		$this->db->insert('orders', $orders);

		//Get order ID
		$order_id = $this->db->get_where('orders', array('code' => $orders['code']))->row()->id;

		//Put into order_detail
		foreach ($cart as $item)
		{		
			$data = array (

				'order_id' 		=> $order_id,
				'product_id'	=> $item['id'],
				// 'options'		=> $item['options'],
				'qty'			=> $item['qty'],
				'sub_total'		=> $item['qty'] * $item['price'],

				);

			//Put into order_detail
			$this->db->insert('order_detail', $data);
		}

		//Get Restaurant ID For emailing drivers
		$restaurant_id = $this->db->get_where('dishes', array('id' => $data['product_id']))->row()->restaurant_id;

		//Get Resto Info
		$restaurant_data = $this->db->get_where('restaurants', array('id' => $restaurant_id))->row();

		$this->db->update('orders', array('restaurant_id' => $restaurant_id));

		return $order_id;

	}

	public function get_orders(){
		$this->db->select('orders.*, restaurants.name as "restaurant", users.username');
		$this->db->from('orders');
		$this->db->join('restaurants','restaurants.id = orders.restaurant_id');
		$this->db->join('users','users.id = orders.user_id');
		$this->db->where('orders.status', 1);
		return $this->db->get()->result();

	}
	
	public function get_order_detail($order_id = ''){
		$this->db->select('order_detail.*, dishes.name, dishes.price');
		$this->db->from('order_detail');
		$this->db->join('dishes','dishes.id = order_detail.product_id');
		$this->db->where('order_detail.order_id',$order_id);
		return $this->db->get()->result();
	}


}