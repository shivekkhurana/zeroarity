<?php
view_header();
$level = array(
	'1'=>"no/very less activity",
	'2'=>"you walk etc, but no/very less routine exercise",
	'3'=>"athelete, runner, dancer, gym beginner",
	'4'=>"5 hrs a week workout or above"
);

$day	= array(
	'1'	=>'1 - Abs ',
	'2'	=>'2 - Arms',
	'3'	=>'3 - Shoulders',
	'4'	=>'4 - Legs',
	'5'	=>'5 - Cardio'
);
?>
<div class="outer_container home_page">
<div class="container">
	<?php echo view_logo_banner();?>
	<div class="row">
		<div class="fourcol">
			<span class="">We follow 5 day workout, 2 day rest system.</span>
			
			<div class="tencol">
			<!--form open--><?php echo form_open($this->uri->uri_string()); ?>
			<?php echo form_label('Level', 'level'); ?>
			<?php echo form_dropdown('level', $level, "Obese (no activity)", "id = level");?>


			<?php echo form_label('Workout day <small class="quiet"> : first time here ? start with Day 1</small>', 'day'); ?>
			<?php echo form_dropdown('day', $day, "Day 1", "id = day");?>
			<?php echo form_submit('submit', 'Submit', "class='init_button orange zeta'"); ?>
			<!--form close--><?php echo form_close(); ?>
			</div>
			
		</div>
		<div class="sixcol last">
			<div class="service_holder">
			Zeroarity helps you to put your body back in shape.
			</div>
			<div class="image_holder">
			</div>
		</div>
	</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container">
<div class="container">
	<div class="row">
		<div class="fourcol">
		Been here before ? <?php echo anchor("/routine/save_or_show", "check your progress here.")?> / <span class="quiet">DISCLAMAIR : WE ARE NOT RESPONSIBLE FOR ANY HARM, INJURY etc CAUSED DUE TO USAGE OF THIS SERVICE.</span>
		</div>
		
		<div class="sixcol">
			<a href="#">facebook</a>
			<a href="#">blog</a>
		</div>
	</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->
<?php view_footer();?>
