<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Emitter extends CI_Controller{
	function index(){
		print_r( json_encode(false) );
	}

	function routine(){
		$id		=	$this->uri->segment(3, NULL);
		$routine	= 	$this->db->where('id', $id)->get('routines');

		if( !($routine->num_rows() == 1) ){
			//no routine with such id found
			redirect('/emitter');
		}
		else{
			$routine	=	$routine->result_array();
			$routine	=	$routine[0];
			$e_list		=	json_decode( $routine['exercises'], true );
			
			$warmup_r_id	=	$routine['warmup']; // id of warmup, which is a routine itself!
			$warmup_routine	= 	$this->db->where('id', $warmup_r_id)->get('routines')->result_array();
			$warmup_routine	= 	$warmup_routine[0];
			
			$exercises	=	array();
			$e_temp		=	array();
			$g_time		=	0;//routine time
			$i		=	0;
			//use $e_temp to populate $exercises
			foreach($e_list as $id => $time){
				$e_temp			=	$this->db->where('id', $id)->get('exercises')->result_array();
				$e_temp			=	$e_temp[0];
				$e_temp['time']		=	$time;
				$g_time			+=	$time;
				$e_temp['images']	=	explode(',', $e_temp['images']);
				$exercises[$i++]	=	$e_temp;				
			}
			
			//fix time to match repeats
			$g_time = $g_time * intval($routine['repeat']);
			
			
			//re-init $i and $e_temp and $e_list
			$i	= 0;
			$e_temp	= array();
			$e_list	= json_decode($warmup_routine['exercises'], true);
			foreach($e_list as $id => $time){
				$e_temp			= $this->db->where('id', $id)->get('exercises')->result_array();
				$e_temp			= $e_temp[0]; 
				$e_temp['time']		= $time;
				$g_time			+= $time;
				$e_temp['images']	= explode(',', $e_temp['images']);
				$warmup[$i++]		= $e_temp;				
			}
			
			//use $e_temp to populate $warmup
			
			
			
			$routine['total_time']	=	$g_time;
			$routine['exercises']	=	$exercises;
			$routine['warmup']	=	$warmup;
			print_r( json_encode( $routine ) );	
		}
	}
	
	function exercise(){
		$id			=	$this->uri->segment(3, NULL);
		$exercise	= 	$this->db->where('id', $id)->get('exercises');

		if( !($exercise->num_rows() == 1) ){
			//no exercise with such id found
			redirect('/emitter');
		}
		else{
			$exercise = $exercise->result_array();
			print_r(  json_encode( $exercise[0] )  );		
		}
	}	

	function routine_by_tags(){
		
	}

	function exercise_by_tags(){
		
	}

	function test(){
		$id		=	$this->uri->segment(3, NULL);
		$routine	= 	$this->db->where('id', $id)->get('routines')->result_array();
		print_r($routine);
	}
}
