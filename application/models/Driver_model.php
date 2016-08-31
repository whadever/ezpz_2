<?php 

class Driver_model extends CI_Model{

	public function get_order_history($id){
		$this->db->select('order_history.*, 
			users.firstname,
			users.lastname,
			restaurants.name,
			transaction.driver_earnings'
			);
		$this->db->from('order_history');
		$this->db->join('transaction','transaction.code = order_history.code','left');
		$this->db->join('users', 'users.id = order_history.user_id');
		$this->db->join('restaurants', 'restaurants.id = order_history.restaurant_id');
		$this->db->where('order_history.driver_id', $id);
		return $this->db->get();
	}

	public function get_earnings($id,$date){
		$this->db->select('order_history.*, 
			transaction.driver_earnings'
			);
		$this->db->from('order_history');
		$this->db->join('transaction','transaction.code = order_history.code','left');
		$this->db->where('order_history.driver_id', $id);
		$this->db->where("order_history.date LIKE '%$date%'");
		return $this->db->get();
	}


}

 ?>