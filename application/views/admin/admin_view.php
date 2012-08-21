<?php
view_header();
if( $this->session->userdata("is_admin") == false ){
	show_404();
}
$flasher = array('success', 'error', 'warning', 'notification');

foreach ($flasher as $flash){
	$a = $this->session->flashdata($flash);
	if(isset( $a )) {
	echo $a;
	}
}
$links = array('add_exercise', 'list_exercises', 'add_routine', 'list_routines', 'list_routines_on_home');
?>


<!--start container and rows, dont end-->
<div class="container">
<div class="row tencol">
<ul class="inline">
<?php foreach($links as $link):?>
<li><?php echo anchor("/admin/$link", $link);?></li>
<?php endforeach;?>
</ul>
</div><!--end:.row-->
