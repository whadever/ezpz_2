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

	public function verify_account($md5)
		{

				$separated_code = explode('~', $md5);
				$data = array(

					'username' => $separated_code[0], 
					'verification_code' => $separated_code[1]

					);


				$set = array (
						
					'is_verified' 			=> 1,
					'verification_code'		=> NULL

					);

				if($this->db->get_where('users', $data)->num_rows() > 0)
				{

					$this->db->set($set);
					$this->db->where($data);
					return $this->db->update('users');

				}else if($this->db->get_where('drivers', $data)->num_rows() > 0)
				{
					
					$this->db->set($set);
					$this->db->where($data);
					return $this->db->update('drivers');

				}else
				{
					return false;
				}
		}

}

 ?>