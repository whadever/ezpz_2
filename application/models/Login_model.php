<?php 

class Login_model extends CI_Model{

	public function check_user($username = '', $password = ''){

		if($this->db->get_where('users',array('username' => $username, 'password' => $password))->num_rows() > 0){

			return $this->db->get_where('users',array('username' => $username, 'password' => $password))->row();

		}else if($this->db->get_where('drivers',array('username' => $username, 'password' => $password))->num_rows() > 0){

			return $this->db->get_where('drivers',array('username' => $username, 'password' => $password))->row();
		
		}else if($this->db->get_where('restaurants', array('username' => $username, 'password' => $password))->num_rows() > 0)
		{
			return $this->db->get_where('restaurants', array('username' => $username, 'password' => $password))->row();
		}else{
				
			return false;
		}

	}

}

 ?>