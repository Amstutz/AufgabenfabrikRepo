<h2><?php __('LUGs'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="LUGs form">
<?php echo $this->Form->create('Lug');?>
	<fieldset>
		<legend><?php __('LUG bearbeiten'); ?></legend>
	<?php
		echo $this->Form->input('name',array('size'=>50));
		echo "<div class='input textarea required'>";
		echo $this->Form->label('content','Klassenstufe');
		echo $this->Form->select('class', array(7=>'7',8=>'8',9=>'9'),null,array('empty' => false));
		echo "</div>";	
		echo "<div class='input textarea'>";
		echo $this->Form->label('description','Beschreibung');
		echo $this->ck->ckeditor('description');
		echo "</div>";
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Senden', true));?>
</div>
