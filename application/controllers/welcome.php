<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{
	public function index()
	{
		
		if( !( $this->input->post('level')) ){
			$this->load->view('level_select.php');
		}
		else{
			//user has already selected the level and day. load appropiate workout
			$data['level']	= $this->input->post('level');
			$data['day']	= $this->input->post('day');
			$id		= $this->db->select('id')->where( $data )->get('home_routines')->result_array();
			$id 		= $id[0]['id'];
			$data		= array('id'=>$id);
			redirect("/routine/show/$id");
		}
	}
	
	function dirty_db(){
	$a= array("CREATE TABLE IF NOT EXISTS `exercises` (
		  `id` int(255) NOT NULL AUTO_INCREMENT,
		  `name` varchar(500) NOT NULL,
		  `description` text NOT NULL,
		  `equipments` varchar(2000) DEFAULT '',
		  `images` varchar(2000) DEFAULT '',
		  `caution` varchar(500) DEFAULT '',
		  `alternate` int(1) NOT NULL COMMENT 'does the user needs to switch sides at half way point ?',
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 
		",
		"
		INSERT INTO `exercises` (`id`, `name`, `description`, `equipments`, `images`, `caution`, `alternate`) VALUES
		(1, 'Recovery', 'Gain your strength back.', NULL, NULL, NULL, 0)
		",
		
		"CREATE TABLE IF NOT EXISTS `exercise_tags` (
		  `id` int(255) NOT NULL,
		  `tag` varchar(500) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1
		",


		"CREATE TABLE IF NOT EXISTS `home_routines` (
		  `level` int(2) NOT NULL,
		  `day` int(5) NOT NULL,
		  `id` int(255) NOT NULL,
		  `name` varchar(500) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1
		",
		"INSERT INTO `home_routines` (`level`, `day`, `id`, `name`) VALUES
		(1, 1, 76, 'gunner mondays'),
		(1, 2, 1, 'gunner mondays'),
		(1, 3, 0, '#'),
		(1, 4, 0, '#'),
		(1, 5, 0, '#'),
		(2, 1, 0, '#'),
		(2, 2, 0, 'a'),
		(2, 3, 0, 'a'),
		(2, 4, 0, 'a'),
		(2, 5, 0, 'a'),
		(3, 1, 0, 'a'),
		(3, 2, 0, 'a'),
		(3, 3, 0, 'a'),
		(3, 4, 0, 'a'),
		(3, 5, 0, 'a'),
		(4, 1, 0, 'a'),
		(4, 2, 0, 'a'),
		(4, 3, 0, 'a'),
		(4, 4, 0, 'a'),
		(4, 5, 0, 'a')
		",
		"CREATE TABLE IF NOT EXISTS `rewards` (
		  `id` int(255) NOT NULL AUTO_INCREMENT,
		  `email` varchar(255) NOT NULL,
		  `seconds` int(255) NOT NULL,
		  `date` varchar(50) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 
		",
		"CREATE TABLE IF NOT EXISTS `routines` (
		  `id` int(255) NOT NULL AUTO_INCREMENT,
		  `name` varchar(500) NOT NULL,
		  `level` varchar(100) NOT NULL,
		  `exercises` varchar(2000) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 
		",
		"CREATE TABLE IF NOT EXISTS `routine_tags` (
		  `id` int(255) NOT NULL,
		  `tag` varchar(500) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1
		");

		foreach( $a as $q ){
			if($this->db->query($q)){
				echo "$q <br/><hr/>";
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
