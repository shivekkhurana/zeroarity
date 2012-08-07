<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Routine extends CI_Controller{
	function index(){
		show_404();
	}

	function show(){
		$id		=	$this->uri->segment(3,1);
		$url	=	site_url("/emitter/routine/$id");
		$data	=	json_decode(file_get_contents($url), true);
		$this->load->view('routine_view', $data);
	}

	function finished(){
		$time = $this->input->post("seconds");
		if($time < 0)
		{
			show_404();
		}

		else{
			$this->session->set_userdata(array("seconds" => $time));
			return true;
		}
	}

	function save_or_show(){
		$time = $this->session->userdata("seconds");
		$this->form_validation->set_rules('email', "Email", "trim|xss_clean|valid_email|required");
		if($this->form_validation->run()){
			$email	= $this->form_validation->set_value('email');
			$email	= str_replace("@", ".", $email); //fix email @-> .
			if($time){

				//if there is time to be saved, save it
				$query	= $this->db->select('email', 'seconds')->where('email', $email)->get('rewards');
				if($this->db->insert('rewards', array( 'seconds'=>$time, 'email'=>$email, 'date'=> date("m.d.y") ) ) ){
						$this->session->unset_userdata('seconds');
						redirect("/routine/rewards/$email");
				}
			}
			else{
				//show rewards otherwise
				redirect("/routine/rewards/$email");
			}

		}
		else{
			$this->load->view('save_or_show_view');
		}

	}

	function rewards(){
		$email = $this->uri->segment(3,0);
		if($email == '0'){
			redirect('/');
		}

		else{
			$query	= $this->db->where('email', $email)->get('rewards');
			if($query->num_rows > 0){
				$data['history']	= $query->result_array();
				$data['email']		= $email;
				$this->load->view('rewards_view', $data);
			}
		}
	}

	function test(){
		print_r( $this->db->where('email', 'shivekk.ymail.com')->get('rewards')->result_array());
	}
}