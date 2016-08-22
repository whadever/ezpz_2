<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart_model extends CI_Model{

		
		public function add ($item)
		{
			$this->cart->insert($item);
		}

		public function update ($data)
		{
			for($i = 0; $i < count($this->cart->contents()); $i++){
				$data_update = array(
						'rowid' => $data['rowid'][$i],
						'qty' => $data['qty'][$i],
						'options' => array('color' => $data['color'][$i] )
					);
				$this->cart->update($data_update);
			}
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