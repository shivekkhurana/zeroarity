<?php view_header();?>
<div class="container">
	<?php view_logo_banner();?>
	<div class="row">
		<div class="twocol">
		<?php $seconds =  $this->session->userdata('seconds')?>
		<?php if($seconds){?>
		You can save your <?php echo $seconds?> workout seconds. Just enter your email.<br/>
		If you saved earlier, <strong>use the same email</strong>.
		<?php }else{?>
		Enter your email, to check your workout history.
		<?php }?>
		</div>
		<div class="fourcol">
			<?php echo form_open($this->uri->uri_string())?>
			<?php echo form_label("Email", "email")?>
			<?php echo form_input('email', "", "id ='email' class='full'");?>
			<span class="quiet"><?php echo form_error("email");?></span>
			<?php echo form_submit('submit', 'Submit', "class='init_button orange zeta'"); ?>
			<?php echo form_close();?>
		</div>
	</div><!--end:.row-->
</div><!--end:.container-->
