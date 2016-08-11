<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model{

		public function check_admin($username,$password)
		{
			return $this->db->get_where('admin', array('username' => $username, 'password' => $password))->row();
		}


		public function newAdmin ($data)
		{
			return $this->db->insert('admin', $data);
		}

		public function get_data($table)
		{
			
			return $this->db->get($table)->result();
			
		}

		public function get_by_condition($table,$condition)
		{
			
			return $this->db->get_where($table,$condition);
			
		}

		public function getClients($status){
			return $this->db->get_where('restaurants',array('is_verified' => $status))->result();
		}
		
	}
 ?>