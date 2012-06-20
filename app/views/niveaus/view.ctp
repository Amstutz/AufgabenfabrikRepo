<h2><?php __('Kompetenzniveaus'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<fieldset>
	<legend><?php __("Kompetenzniveau: ".$niveau['Niveau']['level']); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<?php $i = 0; 
		$class = ' class="altrow"';
		?>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Kompetenzniveau'); ?>&nbsp;</td>
		<td><?php echo $niveau['Niveau']['level']; ?>&nbsp;</td>
	</tr>
	<tr <?php if ($i++ % 2 == 0) {echo $class;}?> >
		<td><?php __('Beschreibung'); ?>&nbsp;</td>
		<td><?php echo $niveau['Niveau']['description']; ?>&nbsp;</td>
	</tr>
</table>
	<br>
	<div class="actions">
		<?php echo $this->Html->link(__('Kompetenzniveau bearbeiten', true), array('action' => 'edit', $niveau['Niveau']['id'])); ?> 
		<?php echo $this->Html->link(__('Kompetenzniveau Löschen', true), array('action' => 'delete', $niveau['Niveau']['id']), null, sprintf(__('Soll der Handlungsaspekt %s wirklich gelöscht werden?', true), $niveau['Niveau']['level'])); ?> 
	</div>
</fieldset>
<fieldset>
	<legend><?php __("Testaufgaben mit diesem Kompetenzniveau"); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<?php $this->Paginator->options(array('model' => 'Exercise')); ?>
			<th><?php echo $this->Paginator->sort('Titel','title');?></th>
			<th><?php echo $this->Paginator->sort('Klasse','class');?></th>
			<th><?php echo $this->Paginator->sort('LUG','lug_id');?></th>
			<th><?php echo $this->Paginator->sort('Aspekt','aspect_id');?></th>
			<th><?php echo $this->Paginator->sort('Bereich','competency_id');?></th>
			<th><?php echo $this->Paginator->sort('Lernziel','goal_id');?></th>
			<th><?php echo $this->Paginator->sort('Niveau','niveau_id');?></th>
			<th class="actions"><?php __('');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($niveau['Exercise'] as $exercise):
		$class = null;
		$altrow = 0;
		$i++;
		if ($i % 2 == 0) {
				$altrow = 1;
				$class = ' class="altrow"';
		}
		if( !empty($exercisesInCart[$exercise['id']])  &&  $exercisesInCart[$exercise['id']])
		{
			$class = ' class="cart"';
		}

		?>
	
	<tr<?php echo $class;?> id='cart<?php echo $exercise['id']; ?>'>
		<td><?php echo $exercise['title']; ?>&nbsp;</td>
		<td><?php echo $exercise['class']; ?>&nbsp;</td>
		<td>
			<?php 
			echo $this->Html->link($Lug[$exercise['lug_id']], array('controller' => 'lugs', 'action' => 'view', $exercise['lug_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Aspect[$exercise['aspect_id']], array('controller' => 'aspects', 'action' => 'view', $exercise['aspect_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Competency[$exercise['competency_id']], array('controller' => 'aspects', 'action' => 'view', $exercise['competency_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Goal[$exercise['goal_id']], array('controller' => 'goals', 'action' => 'view', $exercise['goal_id'])); ?>
		</td>
		<td><?php  echo $this->Html->link($Niveau[$exercise['niveau_id']], array('controller' => 'niveaus', 'action' => 'view', $exercise['niveau_id']));?> &nbsp;</td>

		<td class="actions">
			<a <?php echo 'id='.$exercise['id'] ?> >
			<?php echo $this->Html->image('layout/Document.png', array('id'=>$exercise['id'] ,'alt'=> __('Vorschau',true))); ?></a>
			<?php echo $this->Html->image('layout/Document-Preview.png', array('alt'=>'Öffnen', 'url' => array('controller'=>'exercises','action' => 'view', $exercise['id']))); ?>	
			<?php 
			if( empty($exercisesInCart[$exercise['id']])  ||  !$exercisesInCart[$exercise['id']])
			{
				echo "<a id=\"addCart".$exercise['id']."\" >";
				echo $this->Html->image('layout/File-New.png', array('id'=>"addCart".$exercise['id'] ,'alt'=>'Hinzufügen')); 
				echo "</a>"; 
			}
			else 
			{
				echo "<a id=\"deleteCart".$exercise['id']."\" >";
				echo $this->Html->image('layout/File-Delete.png', array('id'=>"deleteCart".$exercise['id'] ,'alt'=>'Löschen'));		
				echo "</a>";
			}
			?>
			<?php 
			if($admin)
			{
				echo $this->Html->image('layout/Edit-Document.png', array('alt'=> __('Bearbeiten',true), 'url' => array('controller' => 'exercises', 'action' => 'edit', $exercise['id']))); 
			}?>
		</td>
	</tr>
	
	<?php		$this->Js->get('#'.$exercise['id'])->event('click', $this->Js->request( 
			array('controller' => 'exercises','action' => 'view_content',$exercise['id'],$class), 
				array( 
					'update' => "#add".$exercise['id'], 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'get',
			) ) ); ?>
				<?php		$this->Js->get('#addCart'.$exercise['id'])->event('click', $this->Js->request( 
			array('controller' => 'exercises','action' => 'to_cart',$exercise['id'],1,$altrow), 
				array( 
					'update' => "#cart".$exercise['id'] , 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'get',
			) ) ); ?>
				<?php		$this->Js->get('#deleteCart'.$exercise['id'])->event('click', $this->Js->request( 
			array('controller' => 'exercises','action' => 'to_cart',$exercise['id'],0,$altrow), 
				array( 
					'update' => "#cart".$exercise['id'] , 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'get',
			) ) ); ?>
				<tr id='add<?php echo $exercise['id']; ?>'></tr>
<?php endforeach; ?>

	</table>

	<p><?php echo $this->Paginator->counter(array('format' => __('Seite %page% von %pages%, %current% Einträge von %count% Einträgen insgesamt', true)));?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Vorherige', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Nächste', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</fieldset>	






