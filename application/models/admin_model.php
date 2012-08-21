<?php 
class Admin_model extends CI_Model{
	
	function Admin_model(){
		//construct
	}
	
	function routine_exists($id){
		//because $id is unique, it will return either 1 or 0
		return $this->db->select('id')->where('id', $id)->get('routines')->num_rows();
	}

}
