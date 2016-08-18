<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart extends CI_Controller{

		public function __construct(){
			
			parent::__construct();

			if($this->session->userdata('isLogged') == False || $this->session->userdata('type') != 'user')
			{
				redirect('main');
			}
			
		}

		//Add Item To Basket
		public function add()
		{
			if($this->input->post())
			{
				$dish = $this->crud_model->get_by_condition('dishes', array('id' => $this->input->post('dish_id'), 'restaurant_id' => $this->input->post('resto_id')))->row();

				$item  = array (

					'id' 	=> $dish->id,
					'qty'	=> $this->input->post('quantity'),
					'price'	=> $dish->price,
					'name'	=> $dish->name

				);

				if($this->cart_model->add($item))
				{
					$this->session->set_flashdata('success', ' Updating Cart Success!');
					redirect($this->input->post('url'));
				}else
				{
					$this->session->set_flashdata('failed', ' Updating Cart Failed!');
					redirect($this->input->post('url'));
				}
			}else
			{
				redirect ('main');
			}
		}

		//Cart update link
		public function update()
		{
			if($this->input->post())
			{
				$data = array (
					
				'rowid' 		=> $this->input->post('rowid'),
				'qty'			=> $this->input->post('quantity')

					);

				if($this->cart_model->update($data))
				{
					$this->session->set_flashdata('success', ' Updating Cart Success!');
					redirect('cart/overview');
				}
				else
				{
					$this->session->set_flashdata('failed', ' Updating Cart Failed!');
					redirect('cart/overview');
				}

			}else
			{
				redirect ('main');
			}
		}

		public function remove($rowid){

			$this->cart_model->remove($rowid);
			
			redirect('main');
		}

		//Checkout
		public function checkout ()
		{
			$data['page_title']	= 'Your Shopping';
			$data['items']		= $this->cart->contents();
			$this->load->view('cart/checkout', $data);
		}

		//Cart Overview and Check out
		public function overview()
		{
			$data['page_title'] = 'Your Shopping Cart';
			$data['items'] 		= $this->cart->contents() ;
			$this->template->load('default','cart/overview', $data);
		}

	}
?>	