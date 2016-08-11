<?php 
	
class Restaurant_model extends CI_Model{

	public function get_restaurants($cuisine_id = ''){
		if($cuisine_id != ''){
			$restaurants_cuisine = $this->db->get('restaurants')->result();
			$j = 0;
			foreach ($restaurants_cuisine as $value) {

				$exploded_id = explode(', ', $value->cuisine_id);
				for($i = 0; $i < count($exploded_id); $i++){
					if($exploded_id[$i] == $cuisine_id){
						$id[$j] = $value->id;
					}
				}
				$j++;
			}
			
			

			$this->db->select('*');
			$this->db->from('restaurants');
			$this->db->where_in('id',$id);
			$this->db->where('is_verified','1');

			return $this->db->get()->result();
			
		}
		else{
			return $this->db->get('restaurants')->result();
		}
	}

}

?>