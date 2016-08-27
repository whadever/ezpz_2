<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart extends CI_Controller{

		public function __construct(){
			
			parent::__construct();

			if($this->session->userdata('isLogged') == False || $this->session->userdata('type') != 'user')
			{
				redirect('main');
			}
			else if($this->session->userdata('order_status') > 0 && $this->session->userdata('order_status') < 4){
				redirect('order/find_driver/'.$this->session->userdata('code'));
			}
			
		}

		//Add Item To Basket
		public function add()
		{
			if($this->input->post()){
				$dish = $this->crud_model->get_by_condition('dishes', array('id' => $this->input->post('id'), 'restaurant_id' => $this->input->post('resto_id')))->row();

				$item  = array (

					'id' 	=> $dish->id,
					'qty'	=> $this->input->post('quantity'),
					'price'	=> $dish->price,
					'name'	=> $dish->name

				);

				$this->cart_model->add($item);
			
					$carts = $this->cart->contents();

					foreach($carts as $cart){
						if($cart['id'] == $item['id']){
							$rowid = $cart['rowid'];
						}
					}
					echo $rowid;
					#redirect($this->input->post('url'));
				}else{
				redirect('user');
			}

			
		}


		//Cart update link
		public function update()
		{
			if($this->input->post()){	
				$data = array (
					
				'rowid' 		=> $this->input->post('rowid'),
				'qty'			=> $this->input->post('quantity')

					);

				$this->cart_model->update($data);
			}else{
				redirect('user');
			}	

		}

		public function remove(){
			if($this->input->post()){

				$this->cart_model->remove($this->input->post('rowid'));
			

			}else{
				redirect('user');
			}
			
			
			
			
		}

		//Checkout
		public function checkout ()
		{
			$data['page_title']	= 'Your Shopping';
			$data['items']		= $this->cart->contents();
			$data['background'] = base_url()."images/pihza.jpg";
			$data['user'] = $this->crud_model->get_by_condition('users',array('id' => $this->session->userdata('user_id')))->row();
			$this->template->load('default','cart/checkout',$data);
			// $this->load->view('cart/checkout', $data);
		}

		//Cart Overview and Check out
		public function overview()
		{
			$data['page_title'] = 'Your Shopping Cart';
			$data['items'] 		= $this->cart->contents() ;
			$data['background'] = base_url()."images/pihza.jpg";
			$this->template->load('default','cart/overview', $data);
		}

		//destroy Cart
		public function destroy ($param = 'yes')
		{	
			//Get Resto id from cart
			$restaurant_id 		= $this->cart_model->getRestaurantId();
			if($param == 'yes')
			{
				$this->cart->destroy();
				redirect($this->session->flashdata('url'));
			}else
			{
				redirect(base_url() . 'restaurant/detail/' . str_replace(' ', '%20', $this->crud_model->get_by_condition('restaurants', array('id' => $restaurant_id))->row()->name));
			}
		}

	}
?>	