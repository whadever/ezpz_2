<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Restaurant extends CI_Controller{

		public function __construct(){
			parent::__construct();
			date_default_timezone_set('NZ');
			if($this->session->userdata('isLogged') == TRUE){

				if($this->session->userdata('isVerified') == 0){
					redirect('login/verify_account/'.$this->session->userdata('username'));

				}
						
				if($this->session->userdata('type') != 'user'){

					if($this->session->userdata('type') == 'driver'){

						if($this->session->userdata('order_status') == 2 ){
							redirect('driver/accept_order/'.$this->session->userdata('code'));
						}
						elseif($this->session->userdata('order_status') == 3 ){
							redirect('driver/delivery/'.$this->session->userdata('code'));
						}

					}

					redirect($this->session->userdata('type'));
				}

				if($this->session->userdata('type') == 'user'){

					if($this->session->userdata('order_status') == 1 ){
						redirect('order/find_driver/'.$this->session->userdata('code'));
					}
					elseif( $this->session->userdata('order_status') > 1 && $this->session->userdata('order_status') < 5){
						redirect('order/driver_found/'.$this->session->userdata('code'));
					}
				}
				
			}

			
		}

		public function cuisine($cuisine = ''){

			if($cuisine != ''){
				$cuisine_name = str_replace('%20', ' ', $cuisine);
				$data['cuisine_name'] = $cuisine_name;
				$cuisine= $this->crud_model->get_by_condition('cuisines', array('name' => $cuisine_name))->row();
				
				$data['page_title']	= 'Restaurants';
				$data['restaurants']= $this->restaurant_model->get_restaurants($cuisine->id);
				$data['background'] = $cuisine->photo;

			}else{
				$data['cuisine_name'] = "All Restaurants";
				$data['page_title']	= 'Restaurants';
				$data['restaurants']=$this->crud_model->get_by_condition('restaurants',array('is_verified' => 1))->result();
				$data['configuration'] = $this->crud_model->get_data('configuration')->row();
				$data['background'] = $data['configuration']->background;

			}
				$data['configuration'] = $this->crud_model->get_data('configuration')->row();
				$data['lists'] = $this->crud_model->get_data('restaurants')->result();
				$data['restaurant_time'] = $this->crud_model->get_data('restaurant_time')->result();
				
				$this->template->load('default','restaurant/restaurant_list' ,$data);	
		}
		

		public function detail($name = ''){

			if($this->input->post('restaurant-search') != ''){
				$name = $this->input->post('restaurant-search');

				$restaurant = $this->crud_model->get_by_condition('restaurants',array('name' => $name))->row();
				if(!$restaurant){

					redirect($this->uri->segment());

				}
			}
			elseif($this->input->post('restaurant-search') == '' && $name ==''){
				redirect('main');
			}


			$restaurant_name = str_replace('%20', ' ', $name);
			$data['lists'] = $this->crud_model->get_data('restaurants')->result();
			$data['page_title']	= $restaurant_name;
			$data['restaurant'] = $this->crud_model->get_by_condition('restaurants', array('name' => $restaurant_name))->row();

			$data['restaurant_time'] = $this->crud_model->get_by_condition('restaurant_time',array('day' => date('l'),'restaurant_id' => $data['restaurant']->id ))->row();

			$data['dishes'] = $this->crud_model->get_by_condition('dishes', array('restaurant_id' => $data['restaurant']->id))->result();
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$data['background'] = $data['restaurant']->photo;
			$data['cuisines'] = $this->crud_model->get_data('cuisines')->result();

			$data['comments'] = $this->restaurant_model->get_comments($data['restaurant']->id);
		
			//If cart have contents destroy cart, and add new items
			if($this->cart->total_items() > 0)
			{
				$restaurant_id 		= $this->cart_model->getRestaurantId();
				$current_restaurant = $this->crud_model->get_by_condition('restaurants', array('name' => $restaurant_name))->row()->id;
				if($restaurant_id != $current_restaurant)
				{
					$data['cartDestroy'] = TRUE;
				}else
				{
					$data['cartDestroy'] = False;
				}
			}else
			{
				$data['cartDestroy'] = False;
			}

			$this->template->load('default','restaurant/restaurant_details' ,$data);	

		}

		public function post_comment(){
			if($this->input->post()){

				$review = str_replace("\n", '<br />',$this->input->post('review') );

				$data = array(
						'restaurant_id' => $this->input->post('restaurant_id'),
						'user_id' => $this->input->post('user_id'),
						'review' => $review,
						'rating' => 5,
						'date' => date('Y-m-d H:i:s')


					);
				
				$this->crud_model->insert_data('review', $data);
				
				redirect($this->input->post('url'));

			}
		}

		
	}

 ?>