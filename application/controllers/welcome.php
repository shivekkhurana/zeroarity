<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{
	public function index()
	{
		
		if( !( $this->input->post('level')) ){
			$this->load->view('level_select.php');
		}
		else{
			//user has already selected the level and day. load appropiate workout
			$data['level']			= $this->input->post('level');
			$data['day']			= $this->input->post('day');
			$id						= $this->db->select('id')->where( $data )->get('home_routines')->result_array();
			$id 					= $id[0]['id'];
			$data					= array('id'=>$id);
			redirect("/routine/show/$id");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */