<?php
$fields = array(
	'name' => array(
		'name'	=> 'name',
		'id'	=> 'name',
		'value'	=> set_value('name', $name)
	),

	
	'level' => array(
		'name'		=>'level',
		'level_1'	=>'Obese (no/very less activity)',
		'level_2'	=>'Curvy (you walk etc. but no/very less routine exercise)',
		'level_3'	=>'Fit (runner, dancer, gym beginner)',
		'level_4'	=>'Pro (5/+ hrs a weak workout)'
	),

	'exercises' => array(
		'name'	=> 'exercises',
		'id'	=> 'exercises',
		'value'	=> set_value('exercises', $exercises)
	),

	'tags' => array(
		'name'	=> 'tags',
		'id'	=> 'tags',
		'value'	=> set_value('tags', $tags)
	)

);

echo form_open($this->uri->uri_string());

foreach($fields as $input){
	echo form_label($input['name'], $input['name']);

	if($input['name'] == 'exercises'){
		echo form_textarea($input);
	}
	else{
		if($input['name'] == 'level'){
			unset($input['name']);
			echo form_dropdown('level', $input);
			$input['name'] = 'level';	
		}

		else{
			echo form_input($input);
		}
	}
	echo form_error($input['name']);
}
echo form_submit('submit', 'Save');
echo form_close();

//echo anchor("/admin/delete_routine/$id","delete $name");

?>