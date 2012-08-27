<?php
$fields = array(
	'name' => array(
		'name'	=> 'name',
		'id'	=> 'name',
		'value'	=> set_value('name')
	),

	
	'level' => array(
		'name'		=>'level',
		'level_1'	=>'no/very less activity',
		'level_2'	=>'you walk etc., but no/very less routine exercise',
		'level_3'	=>'athelete, runner, dancer, gym beginner',
		'level_4'	=>'5 hrs a weak workout or above'
	),

	/*'exercises' => array(
		'name'	=> 'exercises',
		'id'	=> 'exercises',
		'value'	=> set_value('exercises')
	),*/

	'tags' => array(
		'name'	=> 'tags',
		'id'	=> 'tags',
		'value'	=> set_value('tags')
	),
	'warmup' => array(
		'name' => 'warmup', 
		'id'   => 'warmup',
		'value' => set_value('warmup')
	),
	'repeat' => array(
		'name' => 'repeat', 
		'id'   => 'repeat',
		'value' => set_value('repeat')
	)
);?>
<div class="row tencol">
<?php echo form_open($this->uri->uri_string());

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
}?>
<table class="tencol">
<?php foreach($exercises as $e):
$c_params = array('id'=>"ids[{$e['id']}]", "name"=>"ids[{$e['id']}]");
$i_params = array('id'=>"time[{$e['id']}]", "name"=>"time[{$e['id']}]");
?>
<tr>
  <td><?= form_checkbox($c_params);?></td>
  <td><?= form_label($e['name'],"ids[{$e['id']}]")?></td>
  <td><?= form_input($i_params);?></td>
</tr>
<?php endforeach;?>

</table>
<?php echo form_submit('submit', 'Save');
echo form_close();
?>
</div><!--end:.row-->
<div class="row">
<!--list exercises here-->
</div>
