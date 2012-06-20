<div id="msgid">
</div>
<h2><?php __('Testaufgaben'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="exercises index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Titel','title');?></th>

			<th><?php echo $this->Paginator->sort('Klasse','class');?></th>
			<!-- <th><?php echo $this->Paginator->sort('LUG','lug_id');?></th> -->
			<th><?php echo $this->Paginator->sort('Aspekt','aspect_id');?></th>
			<th><?php echo $this->Paginator->sort('Bereich','competency_id');?></th>
			<th><?php echo $this->Paginator->sort('Kompetenz, Schülerinnen und Schüler ...','goal_id');?></th>
			<th><?php echo $this->Paginator->sort('Niveau','niveau_id');?></th>
			<th class="actions"><?php __('');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($exercises as $exercise):
		$class = null;
		$altrow = 0;
		$i++;
		if ($i % 2 == 0) {
				$altrow = 1;
				$class = ' class="altrow"';
		}
		if( !empty($exercisesInCart[$exercise['Exercise']['id']])  &&  $exercisesInCart[$exercise['Exercise']['id']])
		{
			$class = ' class="cart"';
		}

		?>
	
	<tr<?php echo $class;?> id='cart<?php echo $exercise['Exercise']['id']; ?>'>
		<td><?php echo $exercise['Exercise']['title']; ?>&nbsp;</td>
		<td><?php echo $exercise['Exercise']['class']; ?>&nbsp;</td>
		<!-- <td>
			<?php echo $this->Html->link($exercise['Lug']['name'], array('controller' => 'lugs', 'action' => 'view', $exercise['Lug']['id'])); ?>
		</td> -->
		<td>
			<?php echo $this->Html->link($exercise['Aspect']['name'], array('controller' => 'aspects', 'action' => 'view', $exercise['Aspect']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($exercise['Competency']['name'], array('controller' => 'competencies', 'action' => 'view', $exercise['Competency']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link("... ".$exercise['Goal']['name'], array('controller' => 'goals', 'action' => 'view', $exercise['Goal']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($exercise['Niveau']['level'], array('controller' => 'Niveaus', 'action' => 'view', $exercise['Niveau']['id'])); ?>&nbsp;</td>
		<td class="actions">
			<a <?php echo 'id='.$exercise['Exercise']['id'] ?> >
			<?php echo $this->Html->image('layout/Document.png', array('id'=>$exercise['Exercise']['id'] ,'alt'=> __('Vorschau',true))); ?></a>
			<?php echo $this->Html->image('layout/Document-Preview.png', array('alt'=>'Öffnen', 'url' => array('action' => 'view', $exercise['Exercise']['id']))); ?>	
			<?php 
			if( empty($exercisesInCart[$exercise['Exercise']['id']])  ||  !$exercisesInCart[$exercise['Exercise']['id']])
			{
				echo "<a id=\"addCart".$exercise['Exercise']['id']."\" >";
				echo $this->Html->image('layout/File-New.png', array('id'=>"addCart".$exercise['Exercise']['id'] ,'alt'=>'Hinzufügen')); 
				echo "</a>"; 
			}
			else 
			{
				echo "<a id=\"deleteCart".$exercise['Exercise']['id']."\" >";
				echo $this->Html->image('layout/File-Delete.png', array('id'=>"deleteCart".$exercise['Exercise']['id'] ,'alt'=>'Löschen'));		
				echo "</a>";
			}
			?>
			<?php 
				if($admin){
				echo $this->Html->image('layout/Edit-Document.png', array('alt'=> __('Bearbeiten',true), 'url' => array('controller' => 'exercises', 'action' => 'edit', $exercise['Exercise']['id']))); 
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
				<?php		$this->Js->get('#addCart'.$exercise['Exercise']['id'])->event('click', $this->Js->request( 
			array('controller' => 'exercises','action' => 'to_cart',$exercise['Exercise']['id'],1,$altrow), 
				array( 
					'update' => "#cart".$exercise['Exercise']['id'] , 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'get',
			) ) ); ?>
				<?php		$this->Js->get('#deleteCart'.$exercise['Exercise']['id'])->event('click', $this->Js->request( 
			array('controller' => 'exercises','action' => 'to_cart',$exercise['Exercise']['id'],0,$altrow), 
				array( 
					'update' => "#cart".$exercise['Exercise']['id'] , 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'get',
			) ) ); ?>
				<tr id='add<?php echo $exercise['Exercise']['id']; ?>'></tr>
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


