<?php 
	
class Restaurant_model extends CI_Model{

	public function get_restaurants($cuisine_id = ''){
		if($cuisine_id != ''){
			$restaurants_cuisine = $this->db->get('restaurants')->result();
			$j = 0;
			$id = array();
			foreach ($restaurants_cuisine as $value) {

				$exploded_id = explode(', ', $value->cuisine_id);
				for($i = 0; $i < count($exploded_id); $i++){
					if($exploded_id[$i] == $cuisine_id){
						$id[$j] = $value->id;
					}
				}
				$j++;
			}
			
			if ($id == NULL) {
				$id = array('0');
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

	public function get_comments($restaurant_id){
		$this->db->select('review.*,users.photo,users.username');
		$this->db->from('review');
		$this->db->join('users', 'users.id = review.user_id');
		$this->db->where('review.restaurant_id',$restaurant_id);
		$this->db->order_by('id','desc');
		return $this->db->get()->result();
	}
}

?>