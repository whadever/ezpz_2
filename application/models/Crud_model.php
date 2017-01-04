<?php 
	
class Crud_model extends CI_Model{

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function update_data($table,$data,$condition){
		$this->db->update($table,$data,$condition);
	}

	public function get_data($table){
		return $this->db->get($table);
	}

	public function get_by_condition($table,$condition){
		if($this->db->get_where($table,$condition)){
			return $this->db->get_where($table,$condition);
		}else{
			return false;
		}
	}

	public function delete_data($table,$condition){
		$this->db->delete($table,$condition);
	}

	public function get_order_history($user_id){
		$this->db->select('order_history.*, 
			drivers.firstname, 
			drivers.lastname,
			drivers.email,
			drivers.telephone, 
			restaurants.name'
			);
		$this->db->from('order_history');
		$this->db->join('drivers', 'drivers.id = order_history.driver_id');
		$this->db->join('restaurants', 'restaurants.id = order_history.restaurant_id');
		$this->db->where('order_history.user_id', $user_id);
		return $this->db->get();
	}

}

?>