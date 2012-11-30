<div class="row">
<table class="tencol">
<tr>
	<th>level</th>
	<th>day</th>
	<th>id</th>
	<th>name</th>
</tr>
<?php foreach($routines as $r):?>
<tr>
	<td><?php echo $r['level']?></td>
	<td><?php echo $r['day']?></td>
	<td><?php echo $r['id']?></td>
	<td><?php echo $r['name']?></td>
	<td><?php echo anchor("/admin/edit_routine_for_home/".$r['level']."/".$r['day'], 'edit');?></td>
</tr>
<?php endforeach;?>

</table>
</div><!--end:.row-->
