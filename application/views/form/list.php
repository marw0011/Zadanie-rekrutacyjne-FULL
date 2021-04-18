<div class="table-responsive">
<table class="table table-bordered table-striped text-white">
	<tr>
		<th>Data rozpoczęcia urlopu</th>
		<th>Data zakończenia urlopu</th>
		<th>Typ urlopu</th>
		<th>Komentarz</th>
	</tr>
	<?php
	foreach($forms as $form){?>
	<tr>
		<td><?php echo $form->start_vacation;?></td>
		<td><?php echo $form->end_vacation;?></td>
		<td><?php if($form->type == '1'){echo "urlop zwykły";}else if($form->type == '2'){echo "urlop na żądanie";}else if($form->type == '3'){echo "urlop bezpłatny";}?></td>
		<td><?php echo $form->comment;?></td>
	</tr>
	<?php } ?>
</table>
</div>