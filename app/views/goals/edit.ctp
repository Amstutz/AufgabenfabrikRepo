<h2><?php __('Lernziele'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="goals form">
<?php echo $this->Form->create('Goal');?>
	<fieldset>
		<legend><?php __('Lernziel bearbeiten'); ?></legend>
	<?php
		echo $this->Form->input('name',array('size'=>90));
		echo $this->Form->input('competency_id', array('empty' => '-- Select --','id' => 'competency_id', 'label' => 'Kompetenzbereich nach HarmoS'));	
		echo $this->Form->input('aspect_id', array('empty' => '-- Select --','id' => 'aspect_id', 'label' => 'Handlungsaspekt nach HarmoS'));	
		echo "<div class='input textarea'>";
		echo $this->Form->label('description','Beschreibung');
		echo $this->ck->ckeditor('description');
		echo "</div>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>