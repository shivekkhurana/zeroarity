<div class="row tencol">
<?php
$data = array(
	'name' => array(
		'name'	=> 'name',
		'id'	=> 'name',
		'value'	=> set_value('name')
	),

	'description' => array(
		'name'	=> 'description',
		'id'	=> 'description',
		'value'	=> set_value('description')
	),

	'equipments' => array(
		'name'	=> 'equipments',
		'id'	=> 'equipments',
		'value'	=> set_value('equipments')
	),

	'images' => array(
		'name'	=> 'images',
		'id'	=> 'images',
		'value'	=> set_value('images')
	),

	'caution' => array(
		'name'	=> 'caution',
		'id'	=> 'caution',
		'value'	=> set_value('caution')
	),

	'tags' => array(
		'name'	=> 'tags',
		'id'	=> 'tags',
		'value'	=> set_value('tags')
	),
	'alternate' =>array(
		'name'		=> 'alternate',
		'id'		=> 'alternate',
		'value'		=> 'alternate',
		'checked'	=> FALSE
	)
);
?>
<div class="row tencol">
<?php
echo form_open($this->uri->uri_string());

foreach($data as $input){
	echo form_label($input['name'], $input['name']);

	if($input['name'] == 'description' OR $input['name'] == 'images' OR $input['name'] == 'caution'){
		echo form_textarea($input);
	}
	else if($input['name'] == 'alternate'){
		echo form_checkbox($input);
	}

	else{
		echo form_input($input);
	}
	echo form_error($input['name']);
}
echo form_submit('submit', 'Save');
echo form_close();
?>
</div><!--end:.row-->
