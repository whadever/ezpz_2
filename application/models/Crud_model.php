<?php 
	
class Crud_model extends CI_Model{

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_data($table){
		return $this->db->get($table);
	}


	public function get_by_condition($table,$condition){
		return $this->db->get_where($table,$condition);
	}

}

?>