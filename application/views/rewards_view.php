<?php view_header();?>
<div class="container">
	<?php view_logo_banner();?>
	<div class="row">
		<div class="twocol">
			Hello,<span class="quiet"><?php $email = explode(".", $email); echo $email[0]?></span><br/>
			Towards the left is your workout history. This table would populate as you progress !
		</div>
		<div class="fourcol">
		<table>
			<tr>
				<th>Date</th>
				<th>Seconds</th>
			</tr>
			<?php $total = 0?>
			<?php foreach($history as $h){?>
			<tr>
				<td><?php echo $h['date']; $total+=$h['seconds']?></td>
				<td><?php echo $h['seconds']?></td>
			</tr>
			<?php }?>
		</table>
		</div>
	</div><!--end:.row-->
</div><!--end:.comtainer-->
<?php view_footer();?>