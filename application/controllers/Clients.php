<?php 

class Clients extends CI_Controller{
	
	public function complete_data ($param1 = '')
	{
		if($param1 == 'submit' && $this->session->userdata('type') == 'client')
			{
				if($this->input->post())
				{
					$type = $this->session->userdata('type');
		            $config['allowed_types']        = 'jpg';
		            $config['max_size']             = 5000;
		            // $config['max_width']            = 1000;
		            // $config['max_height']           = 768;

		            $this->load->library('upload', $config);

		            	$config['upload_path']          = 'uploads/clients/' . $this->session->userdata('user_id');
						$config['overwrite']			= True;
						$config['file_name']			= 'photo.jpg';
						$this->upload->initialize($config);

						//Check if the folder for the upload existed
						if(!file_exists($config['upload_path']))
						{
							//if not make the folder so the upload is possible
							mkdir($config['upload_path'], 0777, true);
						}

		                if ($this->upload->do_upload('photo'))
		                {
		                    //Get the link for the database
		                    $photo = $config ['upload_path'] . '/' . $config ['file_name'];
		                }

		                $data = array(

						'username' 			=> $this->input->post('username'),
						'password' 			=> hash_password($this->input->post('password')),
						'email' 			=> $this->input->post('email'),
						'phone' 			=> $this->input->post('telephone'),
						'name'				=> $this->input->post('name'),
						'cuisine'			=> $this->input->post('cuisine'),
						'opentime'			=> $this->input->post('opentime'),
						'closetime'			=> $this->input->post('closetime'),
						'address' 			=> $this->input->post('address'),
						'opendays' 			=> $this->input->post('opendays'),
						'photo'				=> $photo

						);

						if($this->input->post('username') != $this->session->userdata('username'))
						{
							$this->session->set_userdata('username', $this->input->post('username'));
						}

		                $this->load->model('login_model');
		                if($this->login_model->updateUserdata('restaurants', $data))
		                {
		                	$this->session->set_flashdata('success', 'Updating Data Success!');
		            		redirect('main');
		                }
		        }
		    }else
		    {
		    	
				$data['userdata']		= $this->login_model->getUserdata(array('username' => $this->session->userdata('username')));

				$data['page_title'] = 'Update Restaurant Data';
				$this->template->load('default','dashboard/update_form_clients' ,$data);	
		    }
		}

		public function change_password ($param1 = '')
		{	
			if($this->input->post() && $param1 == 'submit')
			{
				$password = $this->input->post('old_password');
				$newpass  = $this->input->post('new_password');
				$confpass  = $this->input->post('conf_password');

				if($newpass != $confpass)
				{
					$this->session->set_flashdata('error', 'Confirmation password and new password is not the same');
					redirect('client/complete_data');
					exit();
				}

				$this->load->model('login_model');
				$data_username = array('username'  => $this->session->userdata('username'));
				$data_user = $this->login_model->getUserdata($data_username);

				if(password_verify($password, $data_user->password))
				{
					$new_data = array('password' => hash_password($this->input->post('password'));

					if($this->login_model->updateUserdata($this->session->userdata('type'), $new_data))
		            {
		                $this->session->set_flashdata('success', 'Updating Password Success!');
		                $this->login_model->email('new_password', $data_user->email, $new_data);
		            	redirect('main');
		            }

				}else
				{
					$this->session->set_flashdata('error', 'Old Password is not correct');
					redirect('client/complete_data');
					exit();
				}
			}else
			{
		        redirect('main');
			}
		}

		public function update_location($lat,$lng){

			$data = array(
				 'latitude' => urldecode($lat),
				 'longitude' => urldecode($lng)
				);
			$this->db->update('restaurants',$data, array('id' => $this->session->userdata('user_id')) );
		}

		public function menu(){

			$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $this->session->userdata('user_id')))->result();

			$data['userdata']		= $this->login_model->getUserdata(array('username' => $this->session->userdata('username')));
			$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('username' => $this->session->userdata('username')))->row();

			$data['page_title'] = 'Update Restaurant Data';
			$this->template->load('default','restaurant/menu' ,$data);
			

		}

	}
 ?>