<?php 

	class Admin_model extends CI_Model{

		public function check_admin($username,$password)
		{
			return $this->db->get_where('admin', array('username' => $username, 'password' => $password))->row();
		}
	}
 ?>