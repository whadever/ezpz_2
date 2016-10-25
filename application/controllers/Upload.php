<?php 

	class Upload extends CI_Controller{

		public function photo($type = '', $id = ''){
			if ($type == '' || $id == '') {
				return false;
			}
			elseif ($type == 'user') {
				$user = $this->crud_model->get_by_condition('users',array('id' => $id))->row();

				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/user/' . $user->username;
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
	            $this->image_moo
				->load($config ['upload_path'] . '/' . $config['file_name'])
				->resize_crop(300,300)
				->save($config ['upload_path'] . '/' . $config['file_name'],TRUE);

	            echo $photo;
			
			}
			elseif ($type == 'driver') {
					$driver = $this->crud_model->get_by_condition('drivers',array('id' => $id))->row();

					$config['allowed_types']        = 'jpg|png|jpeg';
		            $config['max_size']             = 5000;					
					$config['upload_path']          = 'uploads/driver/' . $driver->username;
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

		            $this->image_moo
					->load($config ['upload_path'] . '/' . $config['file_name'])
					->resize_crop(300,300)
					->save($config ['upload_path'] . '/' . $config['file_name'],TRUE);

		            echo $photo;
			}
			elseif ($type == 'restaurant') {
				$restaurant = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
				
				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/restaurant/' . $restaurant->username;
				$config['overwrite']			= True;
				$config['file_name']			= 'photo.jpg';
				$this->upload->initialize($config);

				//Check if the folder for the upload existed
				if(!file_exists($config['upload_path']))
				{
					//if not make the folder so the upload is possible
					mkdir($config['upload_path'], 0777, true);
				}

	            if($this->upload->do_upload('photo'))
	            {
	                //Get the link for the database
	                $image = $this->upload->data();
	                $photo = $config ['upload_path'] . '/' . $config['file_name'];
	            	$thumb = $config ['upload_path'] . '/photo_thumb.jpg';
	            	$data = array('photo' => $photo, 'thumb' => $thumb);  
	            	$data = (object) $data;  
	            	$data = json_encode($data);
	            }
                $this->image_moo
				->load($config ['upload_path'] . '/' . $config['file_name'])
				->resize_crop(350,250)
				->save_pa('','_thumb',TRUE);

				$this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(1300,500)
				->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

		        echo $data;
			}
			elseif ($type == 'dish') {
				$restaurant = $this->crud_model->get_by_condition('restaurants',array('id' => $id))->row();
				
				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/restaurant/' . $restaurant->username . '/' .'dishes/';
				$config['overwrite']			= True;
				#$config['file_name']			= 'photo.jpg';
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
	                $image = $this->upload->data();

	                $photo = $config ['upload_path'] . '/' . $image ['file_name'];
	                
	            }

	            $this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(300,300)
				->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);
			
				echo $photo;

			}
			elseif($type == 'cuisine'){
				$cuisine = $this->crud_model->get_by_condition('cuisines',array('id' => $id))->row();
				unlink(base_url().$cuisine->photo);
				unlink(base_url().$cuisine->thumb);
				$config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2000;
				$config['upload_path']          = 'images/cuisines';
				$config['overwrite']			= False;
				$this->upload->initialize($config);

				//Check if the folder for the upload existed
				if(!file_exists($config['upload_path']))
				{
					//if not make the folder so the upload is possible
					mkdir($config['upload_path'], 0777, true);
				}

	            if ($this->upload->do_upload('photo'))
	            {	
	            	$image = $this->upload->data();
	                //Get the link for the database
	                $photo = $config ['upload_path'] . '/' . $image['file_name'];
	                $thumb = $config ['upload_path'] . '/' . $image['raw_name'].'_thumb'.$image['file_ext'];
	            	$data = array('photo' => $photo, 'thumb' => $thumb);  
	            	$data = (object) $data;  
	            	$data = json_encode($data);

	            }

				//image_moo
				$this->image_moo
					->load($config ['upload_path'] . '/' . $image['file_name'])
					->resize_crop(350,250)
					->save_pa('','_thumb',TRUE);

				$this->image_moo
				->load($config ['upload_path'] . '/' . $image['file_name'])
				->resize_crop(1300,500)
				->save($config ['upload_path'] . '/' . $image['file_name'],TRUE);

				echo $data;
			}

		}


	}
 ?>