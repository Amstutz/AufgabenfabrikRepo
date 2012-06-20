<h2><?php  __('Kategorisierung');?></h2>
<fieldset>
	<legend>
		<?php __("Testaufgabe");?>
	</legend>
	<table cellpadding="0" cellspacing="0">
		<?php $i = 0;
		$class = ' class="altrow"';
		?>
		<tr <?php
		if($i++ % 2 == 0)
		{
			echo $class;
		}
		?> >
			<td><?php __('Nummer');?>&nbsp;</td>
			<td><?php echo ($index+1)."/".$numExercises;
			?>&nbsp;</td>
		</tr>
		<tr <?php
		if($i++ % 2 == 0)
		{
			echo $class;
		}
		?> >
			<td><?php __('Aufgabenstellung');?>&nbsp;</td>
			<td><?php echo $exercise['Exercise']['content'];?>&nbsp;</td>
		</tr>
		<tr <?php
		if($i++ % 2 == 0)
		{
			echo $class;
		}
		?> >
			<td><?php __('Lösung');?>&nbsp;</td>
			<td><?php echo $exercise['Exercise']['solution'];?>&nbsp;</td>
		</tr>
		<br>
	</table>
	<?php echo $this->Form->create('Rating', array('type' => 'post'));?>
	<?php
	if(!empty($storredRating))
	{
		echo $this->Form->input('competency_id', array('empty' => '-- Auswählen --','id' => 'competency_id', 'label' => 'Bitte geben Sie an, welchem Kompetenzbereich nach HarmoS Sie diese Aufgabe zuordnen:'));
		echo $this->Form->input('aspect_id', array('empty' => '-- Auswählen --', 'id' => 'aspect_id', 'label' => 'Bitte geben Sie an, welchem Handlungsaspekt nach HarmoS Sie diese Aufgabe zuordnen:'));
	}
	else
	{
		echo $this->Form->input('competency_id', array('empty' => '-- Auswählen --',  'value' => '0', 'id' => 'competency_id', 'label' => 'Bitte geben Sie an, welchem Kompetenzbereich nach HarmoS Sie diese Aufgabe zuordnen:'));
		echo $this->Form->input('aspect_id', array('empty' => '-- Auswählen --',  'value' => '0', 'id' => 'aspect_id', 'label' => 'Bitte geben Sie an, welchem Handlungsaspekt nach HarmoS Sie diese Aufgabe zuordnen:'));
	}
	?>
	<div id="goals"	>
		<?php
		echo "<p><b>Der ausgewählte Kompetenzbereich mit dem ausgewählten Handlungsaspekt umfasst folgende Kompetenzen:</b></p>";
		if($goals)
		{
			echo "Die Schülerinnen und Schüler...";
			echo "<ul>";
			foreach($goals as $id => $goal)
			{
				echo "<li>...$goal</li>";
			}
		}
		else
		{
			echo "Kompetenzbereich und/oder Handlungsaspekt wurde noch nicht ausgewählt.";
		}

		echo "</ul>";
		?>
	</div>
	<?php
	//echo $this->Form->input('comment', array('label' => 'Falls Sie einen Kommentar zu dieser Aufgabe abgeben möchten, können Sie ihn das untenstehende Textfeld eintragen.'));

	/**
	 $this->Js->get('#aspect_id')->event('change', $this->Js->request(
	 array('action' => 'change_aspect'),
	 array(
	 'update' => '#aspect_help',
	 'async' => true,
	 'dataExpression' => true,
	 'method' => 'post',
	 'data' => $js->serializeForm(array('isForm' =>false, 'inline' => true))
	 ) ) );

	 $this->Js->get('#competency_id')->event('change', $this->Js->request(
	 array('action' => 'change_competency'),
	 array(
	 'update' => '#competency_help',
	 'async' => true,
	 'dataExpression' => true,
	 'method' => 'post',
	 'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
	 ) ) ); **/

	$this->Js->get('#aspect_id')->event('change', $this->Js->request(array('action' => 'auto_select_goal'), array('update' => '#goals', 'async' => true, 'dataExpression' => true, 'method' => 'post', 'data' => $js->serializeForm(array('isForm' => false, 'inline' => true)))));

	$this->Js->get('#competency_id')->event('change', $this->Js->request(array('action' => 'auto_select_goal'), array('update' => '#goals', 'async' => true, 'dataExpression' => true, 'method' => 'post', 'data' => $js->serializeForm(array('isForm' => false, 'inline' => true)))));
	$this->Js->domReady($this->Js->request(array('action' => 'auto_select_goal'), array('update' => '#goals', 'async' => true, 'dataExpression' => true, 'method' => 'post', 'data' => $js->serializeForm(array('isForm' => false, 'inline' => true)))));

	echo $this->Form->end(__('Weiter', true));
	?>
	<div class="actions">
		<?php echo $this->Html->link(__('Zurück', true), array('action' => 'back'));?>
	</div>
</fieldset>
