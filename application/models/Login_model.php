<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function insert_data_new_user($table, $data = array())
		{
			$flag = 0;

			//Check if the thing is present
			$check = array(

				'username' 	=> $data['username']

				);

			//Check On The User Database
			if($this->db->get_where('users', $check)->num_rows() > 0)
			{
				$flag++;
			}
			
			//Check On The Driver Database
			if ($this->db->get_where('drivers', $check)->num_rows() > 0)
			{
				$flag++;
			}

			//Check On The Clients Database
			if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
				$flag++;
			}

			//Check if the thing is present
			$check = array(

				'email' 	=> $data['email']

				);

			//Check On The users Database
			if($this->db->get_where('users', $check)->num_rows() > 0)
			{
				$flag++;
			}
			
			//Check On The Driver Database
			if ($this->db->get_where('drivers', $check)->num_rows() > 0)
			{
				$flag++;
			}

			//Check On The Clients Database
			if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
				$flag++;
			}

			if($flag != 0)
			{
				return false;
			}else
			{
				return $this->db->insert($table, $data);
			}

		}

		public function getAccountType ($username)
		{
			//Check if the thing is present
			$check = array(

				'username' 	=> $username

				);

			//Check On The User Database
			if($this->db->get_where('users', $check)->num_rows() > 0)
			{
				return 'users';
			}
			
			//Check On The Driver Database
			if ($this->db->get_where('drivers', $check)->num_rows() > 0)
			{
				return 'drivers';
			}

			//Check on client database
			if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
				return 'clients';
			}
		}

		public function resetPassword($email,  $data = array())
		{
			//Check if the thing is present
			$check = array(

				'email'		=> $email
				
				);

			//Check On The users Database
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
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
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
			
			//Check On The Driver Database
			else if ($this->db->get_where('drivers', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}

				$new_data = array('password' => hash_password($data['password']));

				$this->db->set($new_data);
				$this->db->where($check);
				return $this->db->update('drivers');
			}

			//Check On The Clients Database
			else if ($this->db->get_where('restaurants', $check)->num_rows() > 0)
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data['password'] . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}

				$new_data = array('password' =>hash_password($data['password']));

				$this->db->set($new_data);
				$this->db->where($check);
				return $this->db->update('drivers');
			}

			else
			{
				return false;
			}

		}
		public function getUserdata ($username, $password)
		{
			if($this->db->get_where('users', array('username' => $username, 'password' => $password))->num_rows() > 0)
			{
				return $this->db->get_where('users', array('username' => $username, 'password' => $password))->row();
			}else if($this->db->get_where('drivers', array('username' => $username, 'password' => $password))->num_rows() > 0)
			{
				return $this->db->get_where('drivers', array('username' => $username, 'password' => $password))->row();
			}
			else if($this->db->get_where('restaurants', array('username' => $username, 'password' => $password))->num_rows() > 0)
			{
				return $this->db->get_where('restaurants', array('username' => $username, 'password' => $password))->row();
			}
			else
			{
				return false;
			}
		}

		public function updateUserdata ($table, $data)
		{
			
			return $this->db->update($table, $data ,array('id' => $this->session->userdata('user_id')) );
		}

		public function email($type, $email, $data)
		{
			if($type == 'new_password')
			{
					$to = $email;
					$subject = "Your Reseted Password";
					$message = "Hello!
								Here is your reseted password\n
								
								Password :" . $data . "\n
								
								For Safety Please Quickly Change Your Password!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}
			}else if($type == 'verify_account')
			{
					$to = $email;
					$subject = "Your to Your New EZPZ Account!";
					$message = "Hello!
								Here is your link for account verification\n";
								
					$message .=	'<a href=' . '"' . $data . '">Click Here to Verify.</a>';
								
					$message .=	" Please Enjoy Our Services!";

					$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'From: noreply@ezpz.com' . "\r\n" .
								'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
					
					if(!mail($to, $subject, $message, $headers))
					{
						return false;
					}
			}
		}

		public function verify_account($md5)
		{

				$seperated_code = explode('~', $md5);
				$data = array(

					'username' => $seperated_code[0], 
					'verification_code' => $seperated_code[1]

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