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

	public function check_username($username = ''){

		if($this->db->get_where('users',array('username' => $username))->num_rows() > 0){

			return $this->db->get_where('users',array('username' => $username))->row();

		}else if($this->db->get_where('drivers',array('username' => $username))->num_rows() > 0){

			return $this->db->get_where('drivers',array('username' => $username))->row();
		
		}else if($this->db->get_where('restaurants', array('username' => $username))->num_rows() > 0)
		{
			return $this->db->get_where('restaurants', array('username' => $username))->row();
		}else{
				
			return false;
		}

	}

	public function check_email($email = ''){

		if($this->db->get_where('users',array('email' => $email))->num_rows() > 0){

			return $this->db->get_where('users',array('email' => $email))->row();

		}else if($this->db->get_where('drivers',array('email' => $email))->num_rows() > 0){

			return $this->db->get_where('drivers',array('email' => $email))->row();
		
		}else if($this->db->get_where('restaurants', array('email' => $email))->num_rows() > 0)
		{
			return $this->db->get_where('restaurants', array('email' => $email))->row();
		}else{
				
			return false;
		}

	}

	public function resetPassword($email,  $data = array())
		{
			//Check if the thing is present
			$check = array(

				'email'		=> $email
				
				);

			//Check On The User Database
			if($this->db->get_where('users', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: irpanwinata@gmail.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}

				$new_data = array('password' => hash_password($data['password']));

				$this->db->set($new_data);
				$this->db->where($check);
				return $this->db->update('users');
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