<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart_model extends CI_Model{

		
		public function add ($item)
		{
			$this->cart->insert($item);
		}

		public function update ($data)
		{
			
			$this->cart->update($data);
			
		}

		public function remove($rowid){

			$data = array(
					'rowid'=> $rowid,
					'qty' => 0

				);

			$this->cart->update($data);	
		}

		public function getRestaurantId ()
		{
			foreach ($this->cart->contents() as $cart) {
				$id 	= $cart['id'];
			}

			return $this->db->get_where('dishes', array('id' => $id))->row()->restaurant_id;
		}
		
	}
 ?>