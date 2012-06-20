<h2><?php  __('Testaufgaben');?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<fieldset>
	<legend><?php __($exercise['Exercise']['title']); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<?php $i = 0; 
		$class = ' class="altrow"';
		?>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Klasse'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['class']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('LUG'); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($exercise['Lug']['name'], array('controller' => 'lugs', 'action' => 'view', $exercise['Lug']['id'])); ?>&nbsp;</td>
	</tr>
		<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Schwierigkeitsgrad'); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($exercise['Niveau']['level'], array('controller' => 'niveaus', 'action' => 'view', $exercise['Niveau']['id'])); ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Handlungsaspekt'); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($exercise['Aspect']['name'], array('controller' => 'aspects', 'action' => 'view', $exercise['Aspect']['id'])); ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Kompetenzbereich'); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($exercise['Competency']['name'], array('controller' => 'competencies', 'action' => 'view', $exercise['Competency']['id'])); ?>&nbsp;</td>
	</tr>
		<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Standard'); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($exercise['Goal']['name'], array('controller' => 'goals', 'action' => 'view', $exercise['Goal']['id'])); ?>&nbsp;</td>
	</tr>
		<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Aufgabenstellung'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['content']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Lösung'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['solution']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Beschreibung'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['description']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Punkte'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['points']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Ersteller'); ?>&nbsp;</td>
		<td><?php echo $exercise['User']['name']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Letzte Änderung'); ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['modified']; ?>&nbsp;</td>
	</tr>
</table>
	<br>
	<div class="actions">
	<?php 
	if($admin)
	{
		echo $this->Html->link(__('Testaufgabe bearbeiten', true), array('action' => 'edit', $exercise['Exercise']['id'])); 
		echo $this->Html->link(__('Testaufgabe Löschen', true), array('action' => 'delete', $exercise['Exercise']['id']), null, sprintf(__('Soll die Aufgabe %s wirklich gelöscht werden?', true), $exercise['Exercise']['title'])); 
	}	
	?>

	</div>
</fieldset>


