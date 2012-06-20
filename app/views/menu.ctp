<div class="actions">
		<?php echo $this->Html->link(__('Testaufgaben', true), array('controller' => 'exercises', 'action' => 'index')); ?>	
		<?php //echo $this->Html->link(__('LUGs', true), array('controller' => 'lugs', 'action' => 'index')); ?> 	
		<?php echo $this->Html->link(__('Handlungsaspekte', true), array('controller' => 'aspects', 'action' => 'index'));?>		
		<?php echo $this->Html->link(__('Kompetenzbereiche', true), array('controller' => 'competencies', 'action' => 'index')); ?>			
		<?php echo $this->Html->link(__('Lernziele', true), array('controller' => 'goals', 'action' => 'index')); ?>	
		<?php echo $this->Html->link(__('Niveaus', true), array('controller' => 'niveaus', 'action' => 'index')); ?>
		
		<?php if($admin)
		{
			echo "<br><br>";
			echo $this->Html->link(__('Neue Testaufgabe', true), array('controller' => 'exercises', 'action' => 'add'));
			echo "&nbsp";
			//echo $this->Html->link(__('Neue LUG', true), array('controller' => 'lugs', 'action' => 'add'));	
			//echo "&nbsp";
			echo $this->Html->link(__('Neuer Handlungsaspekt', true), array('controller' => 'aspects', 'action' => 'add'));
			echo "&nbsp";
			echo $this->Html->link(__('Neuer Kompetenzbereich', true), array('controller' => 'competencies', 'action' => 'add'));
			echo "&nbsp";
			echo $this->Html->link(__('Neues Lernziel', true), array('controller' => 'goals', 'action' => 'add')); 					
			echo "&nbsp";
			echo $this->Html->link(__('Neues Niveau', true), array('controller' => 'niveaus', 'action' => 'add')); 		
		}?>	
</div>
