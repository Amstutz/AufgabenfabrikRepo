<div id="msgid">
</div>
<h2><?php __('Handlungsaspekte'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>

<div class="aspects index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Name','name');?></th>
			<th><?php echo $this->Paginator->sort('Beschreibung','description');?></th>
			<th class="actions"><?php __('');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($aspects as $aspect):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $aspect['Aspect']['name']; ?>&nbsp;</td>
		<td><?php echo $aspect['Aspect']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->image('layout/Document-Preview.png', array('alt'=>'Öffnen', 'url' => array('action' => 'view', $aspect['Aspect']['id']))); ?>	
			<?php 
			if($admin)
			{
				echo $this->Html->image('layout/Edit-Document.png', array('alt'=> __('Bearbeiten',true), 'url' => array('action' => 'edit', $aspect['Aspect']['id']))); 
				echo $this->Html->image('layout/File-Delete.png', array('alt'=>'Löschen', 'url' => array('action' => 'delete', $aspect['Aspect']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true),  $aspect['Aspect']['id']))); 
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p><?php echo $this->Paginator->counter(array('format' => __('Seite %page% von %pages%, %current% Einträge von %count% Einträgen insgesamt', true)));?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Vorherige', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Nächste', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
