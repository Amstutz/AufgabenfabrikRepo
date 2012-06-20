<div id="msgid">
</div>
<h2><?php __('Testaufgaben'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="exercises form">
<?php echo $this->Form->create('Exercise', array('type' => 'post'));?>
	<fieldset>
		<legend><?php __('Testaufgabe bearbeiten'); ?></legend>
	<?php
  
		echo $this->Form->input('title', array('label' => 'Aufgabentitel','maxLength' => 58, 'size'=>50));
		echo "<div class='input textarea required'>";
		echo $this->Form->label('content','Klassenstufe');
		echo $this->Form->select('class', array(7=>'7',8=>'8',9=>'9'),null,array('empty' => false));
		echo "</div>";
		echo $this->Form->input('lug_id', array('empty' => false, 'label' => 'LUG nach Mathbu.ch'));
		echo $this->Form->input('competency_id', array('empty' => '-- Select --','id' => 'competency_id', 'label' => 'Kompetenzbereich nach HarmoS'));	
		echo $this->Form->input('aspect_id', array('empty' => '-- Select --','id' => 'aspect_id', 'label' => 'Handlungsaspekt nach HarmoS'));		
		echo $this->Form->input('goal_id', array('empty' => '-- Select --', 'id' => 'goal_id', 'label' => 'Standart nach HarmoS', 'class' => 'long'));
		echo "<div class='input textarea'>";
		echo $this->Form->label('content','Aufgabenstellung');
		echo $this->ck->ckeditor('content');
		echo $this->Form->label('solution','Lösung');
		echo $this->ck->ckeditor('solution');
		echo $this->Form->label('desription','Beschreibung');
		echo $this->ck->ckeditor('description');
		echo "</div>";
		echo $this->Form->input('niveau_id', array('label' => 'Schwierigkeitsgrad'));
		echo $this->Form->input('points', array('label' => 'Punkte','maxLength' => 5, 'size'=>4));		
		
		$this->Js->get('#aspect_id')->event('change', $this->Js->request( 
			array('action' => 'auto_select_goal'), 
				array( 
					'update' => '#goal_id', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' =>false, 'inline' => true))
			) ) ); 
	
		$this->Js->get('#competency_id')->event('change', $this->Js->request( 
			array('action' => 'auto_select_goal'), 
				array( 
					'update' => '#goal_id', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) ) ); 
			$this->Js->get('#goal_id')->event('change', $this->Js->request( 
			array('action' => 'auto_select_competency'), 
				array( 
					'update' => '#competency_id', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) ) ); 
			$this->Js->get('#goal_id')->event('change', $this->Js->request( 
			array('action' => 'auto_select_aspect'), 
				array( 
					'update' => '#aspect_id', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) ) ); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>
