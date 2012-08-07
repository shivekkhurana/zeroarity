level <?php echo $level?> day <?php echo $day?>

<!--form open--><?php echo form_open($this->uri->uri_string()); ?>
<?php 
	echo form_label('Enter new routine id', 'id');
	echo form_input( array( 'name'=>'id' ) );
	echo form_error('id');
?>

<div>
<?php echo form_submit('submit', 'submit'); ?>
</div>

<!--form close--><?php echo form_close(); ?>

