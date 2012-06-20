<h2><?php __('Testserien'); ?></h2>

<fieldset>
	<legend><?php echo $cart['title']; ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<?php $this->Paginator->options(array('model' => 'Exercise')); ?>
			<th><?php echo $this->Paginator->sort('Titel','title');?></th>
			<th><?php echo $this->Paginator->sort('Klasse','class');?></th>
			<!--<th><?php echo $this->Paginator->sort('LUG','lug_id');?></th>-->
			<th><?php echo $this->Paginator->sort('Aspekt','aspect_id');?></th>
			<th><?php echo $this->Paginator->sort('Bereich','competency_id');?></th>
			<th><?php echo $this->Paginator->sort('Kompetenz, Schülerinnen und Schüler ... ','goal_id');?></th>
			<th><?php echo $this->Paginator->sort('Niveau','niveau_id');?></th>
			<th class="actions"><?php __('');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($Exercise as $exercise)
	{	
		if(!empty($exercisesInCart[$exercise['Exercise']['id']]))
		{
			$class = null;
			$altrow = 0;
			$i++;
			if ($i % 2 == 0) {
					$altrow = 1;
					$class = ' class="altrow"';
			}
			if( !empty($exercise['id'])  &&  $exercise['id'])
			{
				$class = ' class="cart"';
			}
	
			?>
		
		<tr<?php echo $class;?> id='cart<?php echo $exercise['Exercise']['id']; ?>'>
			<td><?php echo $exercise['Exercise']['title']; ?>&nbsp;</td>
			<td><?php echo $exercise['Exercise']['class']; ?>&nbsp;</td>
			<!--<td>
				<?php echo $this->Html->link($Lug[$exercise['Exercise']['lug_id']], array('controller' => 'lugs', 'action' => 'view', $exercise['Exercise']['lug_id'])); ?>
			</td>-->
			<td>
				<?php echo $this->Html->link($Aspect[$exercise['Exercise']['aspect_id']], array('controller' => 'aspects', 'action' => 'view', $exercise['Exercise']['aspect_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($Competency[$exercise['Exercise']['competency_id']], array('controller' => 'aspects', 'action' => 'view', $exercise['Exercise']['competency_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link("... ".$Goal[$exercise['Exercise']['goal_id']], array('controller' => 'goals', 'action' => 'view', $exercise['Exercise']['goal_id'])); ?>
			</td>
			<td><?php  echo $this->Html->link($Niveau[$exercise['Exercise']['niveau_id']], array('controller' => 'niveaus', 'action' => 'view', $exercise['Exercise']['niveau_id']));?> &nbsp;</td>
	
			<td class="actions">
				<a <?php echo 'id='.$exercise['Exercise']['id'] ?> >
				<?php echo $this->Html->image('layout/Document.png', array('id'=>$exercise['Exercise']['id'] ,'alt'=> __('Vorschau',true))); ?></a>
				<?php echo $this->Html->image('layout/Document-Preview.png', array('alt'=>'Öffnen', 'url' => array('controller' => 'exercises', 'action' => 'view', $exercise['Exercise']['id']))); ?>	
				<?php 
				if( !empty($exercisesInCart[$exercise['Exercise']['id']])  &&  $exercisesInCart[$exercise['Exercise']['id']])
				{
					echo "<a id=\"deleteCart".$exercise['Exercise']['id']."\" >";
					echo $this->Html->image('layout/File-Delete.png', array('id'=>"deleteCart".$exercise['Exercise']['id'] ,'alt'=>'Löschen'));		
					echo "</a>"; 
				}
				?>
			</td>
		</tr>
		
		<?php		$this->Js->get('#'.$exercise['Exercise']['id'])->event('click', $this->Js->request( 
				array('controller' => 'exercises','action' => 'view_content',$exercise['Exercise']['id'],$class), 
					array( 
						'update' => "#add".$exercise['Exercise']['id'], 
						'async' => true, 
						'dataExpression' => true, 
						'method' => 'get',
				) ) ); ?>

					<?php		$this->Js->get('#deleteCart'.$exercise['Exercise']['id'])->event('click', $this->Js->request( 
				array('controller' => 'carts','action' => 'remove_from_cart',$exercise['Exercise']['id']), 
					array( 
						'update' => "#cart".$exercise['Exercise']['id'] , 
						'async' => true, 
						'dataExpression' => true, 
						'method' => 'get',
				) ) ); ?>
					<tr id='add<?php echo $exercise['Exercise']['id']; ?>'></tr>
<?php }}?>

	</table>
<div class="actions">
	<?php echo $this->Html->link(__('Speichern', true), array('controller' => 'carts', 'action' => 'save')); ?>
	<?php echo $this->Html->link(__('Leeren', true), array('action' => 'delete_cart'), null, sprintf(__('Möchten Sie wirklich alle Aufgaben aus der aktuellen Testserie löschen?', true))); ?> 
	<?php echo $this->Html->link(__('Eigenschaften', true), array('controller' => 'carts', 'action' => 'set_properties')); ?>
	<?php echo $this->Html->link(__('Als Worddatei (docx) herunterladen', true), array('controller' => 'carts', 'action' => 'download','Link233öö','docx')); ?>
</div>

</fieldset>	







<fieldset>
	<legend><?php __("Gespeicherte Testserien"); ?></legend>
	<?php if($users_username):?>
<div class="carts index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Titel','title');?></th>
			<th><?php echo $this->Paginator->sort('Ersteller','created_from');?></th>	
			<th><?php echo $this->Paginator->sort('Erstelt am','created');?></th>	
			<th><?php echo $this->Paginator->sort('Letzte Änderung','modified');?></th>										
			<th></th>
	</tr>
	<?php
	$i = 0;
	foreach ($carts as $cart):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	if($cart['Cart']['user_id']==$user['User']['id']):
	 ?>
	<tr<?php echo $class;?>>
		<td><?php echo $cart['Cart']['title']; ?>&nbsp;</td>
		<td><?php echo $cart['Cart']['created_from']; ?>&nbsp;</td>
		<td><?php echo $cart['Cart']['created']; ?>&nbsp;</td>
		<td><?php echo $cart['Cart']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Laden', true), array('action' => 'load', $cart['Cart']['id'])); ?>
			<?php echo $this->Html->link(__('Löschen', true), array('action' => 'delete', $cart['Cart']['id']), null, sprintf(__('Sind Sie sicher, dass sie die "%s" löschen möchten?', true), $cart['Cart']['title'])); ?>
		</td>
	</tr>
	<?php endif; ?>
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
<?php else:?>
<p>Sie müssen angemeldet sein, um Testerien speichern zu können.</p>
<?php endif ?>
</fieldset>	


