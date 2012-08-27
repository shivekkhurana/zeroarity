<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		//preloads
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		
	}

	function index(){
		//top links
		$this->load->view('admin/admin_view');
	}
	
	function make_admin(){
		$key = $this->uri->segment(3,1);
		if($key == '1'){
			redirect("admin");
		}
		else if($key == "493fgh5672djka"){
			$this->session->set_userdata("is_admin", "Hola");
			redirect("admin");
		}
		else{
			redirect("admin");
		}
	}
	
	function break_admin(){
		$this->session->unset_userdata("is_admin");
	}
		
	
	function add_exercise(){
		$this->load->view('admin/admin_view');

		/*set form validation rules*/
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('equipment', 'Equipment', 'trim|xss_clean');
		$this->form_validation->set_rules('images', 'Images', 'trim|xss_clean');
		$this->form_validation->set_rules('caution', 'Caution', 'trim|xss_clean');
		$this->form_validation->set_rules('tags', 'Tags', 'trim|required|xss_clean');

		if(!$this->form_validation->run()){
			//form not submitted yet
			$this->load->view('admin/add_exercise_view');
		}
		
		//*//
		else{
			//prep form data
			$alternate = 0;
			if( $this->input->post('alternate') )
			{
				$alternate = 1;
			}
			$data = array(
				'name'		=> $this->form_validation->set_value('name'),
				'description'	=> $this->form_validation->set_value('description'),
				'equipments'	=> $this->form_validation->set_value('equipment'),
				'images'	=> $this->form_validation->set_value('images'),
				'caution'	=> $this->form_validation->set_value('caution'),
				'alternate'	=> $alternate
			);
			$this->db->insert('exercises',$data);
			$id = $this->db->insert_id();

			//add tags
			$tags = explode(',', $this->form_validation->set_value('tags'));
			foreach($tags as $tag){
				$this->db->insert('exercise_tags', array('id'=>$id, 'tag'=>str_replace(" ", "",$tag)));
			}

			//success
			$this->session->set_flashdata('success', $data['name'].' added to db.');
			redirect('admin/add_exercise');
		}
		//*/

	}

	function list_exercises(){
		$this->load->view('admin/admin_view');
		$tag	= $this->uri->segment(3,'all');
		$data	= array();
		$data['tag']  = $tag; //current selected tag
		$data['exercises'] = $this->Admin_model->get_exercises($tag);
		$tag_list_raw = $this->db->select('tag')->distinct()->order_by('tag', 'asc')->get('exercise_tags')->result_array();
		$tag_list = array();
		foreach($tag_list_raw as $a){
			$tag_list[] = $a['tag']; 
		}
		$data['tag_list'] = $tag_list;
		//*/
		$this->load->view('admin/list_exercises_view', $data);
	}

	function edit_exercise(){
		$this->load->view('admin/admin_view');

		$id = $this->uri->segment(3,NULL);
		if($id == NULL){
			$this->session->set_flashdata('warning', 'Stop playing with urls.');
			redirect('/admin/list_exercises');
		}		
		else{
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('equipment', 'Equipment', 'trim|xss_clean');
			$this->form_validation->set_rules('images', 'Images', 'trim|xss_clean');
			$this->form_validation->set_rules('caution', 'Caution', 'trim|xss_clean');
			$this->form_validation->set_rules('tags', 'Tags', 'trim|required|xss_clean');

			//get old_tags
			$a = $this->db->select('tag')->where('id', $id)->get('exercise_tags')->result();
			$c = array();
			$i = 0;
			foreach($a as $b){
				$c[$i] = $b->tag;
				$i++;
			}
			$old_tags = implode(',',$c);

			if(!$this->form_validation->run()){
				$data = $this->db->where('id', $id)->get('exercises');
				if($data->num_rows() == 0){
					$this->session->set_flashdata('error', 'No exercise with this id.');
					redirect('/admin');
				}
				else{
					$a		= $data->result_array();
					$data	= $a[0];
					$data['old_tags'] = $old_tags; 
					$this->load->view('admin/edit_exercise_view', $data);
				}
			}
			else{
				$data = array(
					'name'			=>	$this->form_validation->set_value('name'),
					'description'	=>	$this->form_validation->set_value('description'),
					'equipments'	=>	$this->form_validation->set_value('equipment'),
					'images'		=>	$this->form_validation->set_value('images'),
					'caution'		=>	$this->form_validation->set_value('caution')
					);
				$this->db->where('id', $id)->update('exercises',$data);

				$new_tags = explode(',', $this->form_validation->set_value('tags'));
				if($new_tags != explode(',',$old_tags)){
					//remove all old tags and re-insert
					$this->db->where('id', $id)->delete('exercise_tags');

					foreach($new_tags as $tag){
					$this->db->insert('exercise_tags', array('id'=>$id, 'tag'=>str_replace(" ", '',$tag)));
					}
				}
				$this->session->set_flashdata('success', $data['name'].' edited successfully.');
				redirect('/admin/list_exercises');
			}
		}
	}

	function add_routine(){
		$this->load->view('admin/admin_view');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('exercises', 'Exercises', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tags', 'Tags', 'trim|required|xss_clean');
		$this->form_validation->set_rules('warmup', 'Warmup', 'trim|required|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('repeat', 'Repeat', 'trim|required|xss_clean|is_natural_no_zero');
		if(!$this->form_validation->run()){
			$data['exercises'] = $this->Admin_model->get_exercises();
			$this->load->view('/admin/add_routine_view', $data);
		}
		else{
			$ids = $this->input->post('ids');
			$time = $this->input->post('time');
			$e = array();
			foreach($ids as $k=>$v){
				$e[$k] = $time[$k];
			}
			$e = json_encode($e);
			
			$data = array(
				'name'=>$this->form_validation->set_value('name'),
				'level'=>$this->form_validation->set_value('level'),
				'exercises'=>$e,				
				'warmup'=>$this->form_validation->set_value('warmup'),
				'repeat'=>$this->form_validation->set_value('repeat')
				);
			
			//*/
		
			//check if warmup is a valid routine
			if($this->Admin_model->routine_exists($data['warmup']))
			{
				$this->db->insert('routines', $data);
				$id = $this->db->insert_id();

				//add tags
				$tags = explode(',', $this->form_validation->set_value('tags'));
				foreach($tags as $tag){
					$this->db->insert('routine_tags', array('id'=>$id, 'tag'=>$tag));
				}
				$this->session->set_flashdata('success', $data['name'].' added to db.' );
				redirect('/admin/add_routine');
				//*/
			}
			else
			{
				$this->session->set_flashdata('error', 'No routine with this id.');
				redirect('/admin/list_routines_on_home');	
			}
		}		
	}

	function list_routines(){
		$this->load->view('admin/admin_view');

		$data			=	array();
		$where			=	array();
		$data['level']		=	$this->uri->segment(3, 'all');

		if($data['level'] != 'all'){
			$where['level'] = $data['level'];
		}

		$data['routines']	=	$this->db->where($where)->get('routines')->result_array();
		$this->load->view('admin/list_routines_view', $data); 
	}

	function edit_routine(){
		$this->load->view('admin/admin_view');

		$data		=	array();
		$data['id']	=	$this->uri->segment(3,NULL);
		if($data['id'] == NULL){
			$this->session->set_flashdata('warning', 'Stop playing with urls.');
			redirect('/admin/list_routines');
		}	

		$query = $this->db->where('id', $data['id'])->get('routines');

		//get old_tags
		$a = $this->db->select('tag')->where('id', $data['id'])->get('routine_tags')->result();
		$c = array();
		$i = 0;
		foreach($a as $b){
			$c[$i] = $b->tag;
			$i++;
		}
		$old_tags = implode(',',$c);
		if($query->num_rows() == 0){
			$this->session->set_flashdata('warning', 'Stop playing with urls.');
			redirect('/admin/list_routines');
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('exercises', 'Exercises', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tags', 'Tags', 'trim|required|xss_clean');
		$this->form_validation->set_rules('warmup', 'Warmup', 'trim|required|xss_clean|is_natural_no_zero');
		$this->form_validation->set_rules('repeat', 'Repeat', 'trim|required|xss_clean|is_natural_no_zero');

		if(!$this->form_validation->run()){
			$routine = $query->result_array();
			$routine = $routine[0];

			$data['name']		=	$routine['name'];
			$data['exercises']	=	$routine['exercises'];
			$data['warmup']		= 	$routine['warmup'];
			$data['repeat']		= 	$routine['repeat'];
			$data['tags']		=	$old_tags;

			$this->load->view('admin/edit_routine_view', $data);
		}
		else{
			$data['name']		=	$this->form_validation->set_value('name');
			$data['exercises']	=	$this->form_validation->set_value('exercises');
			$data['warmup']		=	$this->form_validation->set_value('warmup');
			$data['repeat']		=	$this->form_validation->set_value('repeat');
			
			//check if warmup is a valid routine
			if($this->Admin_model->routine_exists($data['warmup']))
			{
				$this->db->where('id', $data['id'])->update('routines', $data);

				$new_tags = explode(',', $this->form_validation->set_value('tags'));
				if($new_tags != explode(',', $old_tags)){
					//remove all old tags and re-insert
					$this->db->where('id', $data['id'])->delete('routine_tags');
					foreach($new_tags as $tag){
						$this->db->insert('routine_tags', array('id'=>$data['id'], 'tag'=>$tag));
					}
				}
				$this->session->set_flashdata('success', $data['name'].' edited successfully.');
				redirect('/admin/list_routines');
			}
			else
			{
				$this->session->set_flashdata('error', 'No routine with this id.');
				redirect('/admin/list_routines_on_home');	
			}
			
		}
	}

	function list_routines_on_home(){
		$this->load->view('admin/admin_view');

		//initially load all level workouts and give links to edit
		$data				=	array();
		$where				=	array();

		$data['routines']	=	$this->db->get('home_routines')->result_array();
		$this->load->view('admin/list_routines_on_home_view', $data); 
		
	}

	function edit_routine_for_home(){
		$this->load->view('admin/admin_view');

		$data 		= array();
		$data['level']	= $this->uri->segment(3,'1');
		$data['day']	= $this->uri->segment(4,'1');

		$this->form_validation->set_rules('id', 'id', 'trim|xss_clean|required|is_natural_no_zero');

		if(!( $this->form_validation->run() )){
			$this->load->view('admin/edit_routine_for_home_view', $data);
		}
		else{
			$id		= $this->form_validation->set_value('id');		
			if($this->Admin_model->routine_exists($id))
			{	
				$routine_name	= $routine_name->result_array();
				$routine_name	= $routine_name[0]['name'];
				if( $this->db->where( array('level'=>$data['level'], 'day'=>$data['day']) )->update('home_routines', array('id'=>$id, 'name'=>$routine_name)) ){
					$this->session->set_flashdata('success', 'Routine edited successfully.');
					redirect('/admin/list_routines_on_home');
				}
				else{
					$this->session->set_flashdata('error', 'Unable to edit routine.');
					redirect('/admin/list_routines_on_home');
				}
			}
			else{
				$this->session->set_flashdata('error', 'No routine with this id.');
				redirect('/admin/list_routines_on_home');		
			}
		}
	}

	function user_reports(){
		#TODO
	}

	function user_message_abuse(){
		#TODO	
	}
	
	function test(){
		
		$a = array('f','v','c','d');
		echo form_open($this->uri->uri_string());
		foreach($a as $b){
			echo $b;
			$input = array('name'=>"id[$b]", 'id'=>"id[$b]");
			echo form_checkbox($input);
			echo form_input(array('name'=>"time[$b]", "id" =>"time[$b]"));
			echo "<hr/>";
		}
		echo form_submit('submit', 'Save');
		echo form_close();
		
		$ids = $this->input->post('id');
		$time = $this->input->post('time');
		$e = array();
		foreach($ids as $k=>$v){
			$e[$k] = $time[$k];
		}
		
		print_r(json_encode($e));
		
		
		
	}
	
}
