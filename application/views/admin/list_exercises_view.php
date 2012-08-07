<?php $tags	= array('legs','butt','core','abs','obliques','chest','shoulders','arms','neck','wrist','face','recovery');?>
<ul>
<?php foreach($tags as $t):?>
<li><?php echo anchor("/admin/list_exercises/$t", $t);?></li>
<?php endforeach;?>
</ul>

<hr/>
<?php if(count($exercises) > 0):?>
<h2><?php echo ($tag);?></h2>
<table>
<tr>
	<th>id</th>
	<th>name</th>
	<th>action</th>
</tr>
<?php foreach($exercises as $e):?>
<tr>
	<td><?php echo $e['id']?></td>
	<td><?php echo $e['name']?></td>
	<td><a href = '<?php echo site_url().'/admin/edit_exercise/'.$e['id']?>'>edit</a></td>
</tr>
<?php endforeach; endif;?>

</table>