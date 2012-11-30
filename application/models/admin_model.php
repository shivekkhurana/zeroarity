<?php 
class Admin_model extends CI_Model{
	
	function Admin_model(){
		//construct
	}
	
	function routine_exists($id){
		//because $id is unique, it will return either 1 or 0
		return $this->db->select('id')->where('id', $id)->get('routines')->num_rows();
	}
	
	function get_exercises($tag = 'all'){
		$where = array();
		if($tag != 'all') $where['tag'] = $tag;
			
		$ids = $this->db->where($where)->get('exercise_tags');
		
		//no exercise with specified tags, return empty array
		if(!$ids->num_rows() > 0) return array();
		
		else{
			$id_list = array(); //simple list of e_ids with tag == $tag
			$ids = $ids->result_array();
			foreach($ids as $id){
				$id_list[] = $id['id'];
			}
			
			return $this->db->where_in('id', $id_list)->order_by('id', 'desc')->get('exercises')->result_array();
			
		}
	}

	function get_exercise_names(){
		//for add routine
		
	}
}
