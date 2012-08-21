<div class="row tencol">
<?php $levels=array('all', 'level_1', 'level_2', 'level_3', 'level_4');?>
<ul class="inline">
<?php foreach($levels as $l):?>
<li><?php echo anchor("/admin/list_routines/$l", $l);?></li>
<?php endforeach;?>
</ul>

<hr/>
<h2><?php echo ($level);?></h2>
<?php if(count($routines) > 0):?>
<table>
<tr>
	<th>id</th>
	<th>name</th>
	<th>action</th>
</tr>
<?php
foreach($routines as $r):?>
<tr>
	<td><?php echo $r['id']?></td>
	<td><?php echo $r['name']?></td>
	<td><a href = '<?php echo site_url().'/admin/edit_routine/'.$r['id']?>'>edit</a></td>
</tr>
<?php endforeach;?>
</table>
<?php endif;?>
</div><!--end:.row-->
