<div class="users index">
	<h2><?php __('Benutzer');?></h2>
<div class="actions">
		<?php echo $this->Html->link(__('Neuer Benutzer', true), array('controller' => 'users', 'action' => 'add')); ?>
		<?php echo $this->Html->link(__('Eigenes Profil bearbeiten', true), array('controller' => 'users', 'action' => 'edit')); ?>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Benutzername','username');?></th>
			<th><?php echo $this->Paginator->sort('Name','name');?></th>
			<th><?php echo $this->Paginator->sort('E-Mailadresse','name');?></th>			
			<th><?php echo $this->Paginator->sort('Gruppe','group_id');?></th>
			<th><?php echo $this->Paginator->sort('Erstellt am','created');?></th>
			<th><?php echo $this->Paginator->sort('Letzte Änderung','modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['mail']; ?>&nbsp;</td>		
		<td><?php echo $user['User']['group_id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Öffnen', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Löschen', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Sind sie sicher dass sie "%s" löschen möchten?', true), $user['User']['username'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p><?php echo $this->Paginator->counter(array('format' => __('Seite %page% von %pages%, %current% Einträge von %count% Einträgen insgesamt', true)));?>	</p>


	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
