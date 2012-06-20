<h2><?php __('Kompetenzniveaus'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="niveaus form">
<?php echo $this->Form->create('Niveau');?>
	<fieldset>
		<legend><?php __('Kompetenzniveau hinzufügen'); ?></legend>
	<?php
		echo $this->Form->input('level',array('label'=>'Schwierigkeitsgrad','size'=>3));
		echo "<div class='input textarea'>";
		echo $this->Form->label('description','Beschreibung');
		echo $this->ck->ckeditor('description');
		echo "</div>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>
