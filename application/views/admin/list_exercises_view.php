<div class="row">
<ul class="inline tencol">
<?php foreach($tag_list as $t):?>
<li><?php echo anchor("/admin/list_exercises/$t", $t);?></li>
<?php endforeach;?>
</ul>
</div><!--end:.row-->

<div class="row">
<table class="tencol">
<thead>
  <tr>
    <th class="">id</th>
    <th>name<th>
  </tr>
</thead>
<tbody>
<?php if(count($exercises) > 0):
  $site_url = site_url();
  foreach($exercises as $e):?>
<tr>
  <td><?= $e['id']?></td>
  <td><?= $e['name']?></td>
  <td><a href="<?php echo $site_url.'/admin/edit_exercise/'.$e['id']?>">edit</a></td>
</tr>

<?php endforeach;endif;?>
</tbody>
</table>
</div><!--end:.row-->

