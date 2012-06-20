

<h2><?php  __('Konto');?></h2>

<fieldset>
	<legend><?php __($user['User']['username']); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<?php $i = 0; 
		$class = ' class="altrow"';
		?>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Name'); ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('E-Mailadresse'); ?>&nbsp;</td>
		<td><?php echo $user['User']['mail']; ?>&nbsp;</td>
	</tr>
		<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Heruntergeladene Testserien'); ?>&nbsp;</td>
		<td><?php echo $user['User']['series_downloaded']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Erstellt am'); ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Letzte Änderung'); ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
	</tr>
</table>
	<br>
	<div class="actions">
	<?php 
	if($edit)
	{
		echo $this->Html->link(__('Konto bearbeiten', true), array('action' => 'edit')); 
	}	
	?>

	</div>
</fieldset>
