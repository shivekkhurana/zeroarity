<?php
$fields = array(
	'name' => array(
		'name'	=> 'name',
		'id'	=> 'name',
		'value'	=> set_value('name', $name)
	),

	'description' => array(
		'name'	=> 'description',
		'id'	=> 'description',
		'value'	=> set_value('description', $description)
	),

	'equipments' => array(
		'name'	=> 'equipments',
		'id'	=> 'equipments',
		'value'	=> set_value('equipments', $equipments)
	),

	'images' => array(
		'name'	=> 'images',
		'id'	=> 'images',
		'value'	=> set_value('images', $images)
	),

	'caution' => array(
		'name'	=> 'caution',
		'id'	=> 'caution',
		'value'	=> set_value('caution', $caution)
	),

	'tags' => array(
		'name'	=> 'tags',
		'id'	=> 'tags',
		'value'	=> set_value('tags', $old_tags)
	)
);

echo form_open($this->uri->uri_string());

foreach($fields as $input){
	echo form_label($input['name'], $input['name']);

	if($input['name'] == 'description' OR $input['name'] == 'images' OR $input['name'] == 'caution'){
		echo form_textarea($input);
	}
	else{
		echo form_input($input);
	}
	echo form_error($input['name']);
}
echo form_submit('submit', 'Save');
echo form_close();
?>

