<h2><?php __('Handlungsaspekte'); ?></h2>
<?php include_once APP ."/views/menu.ctp";?>
<div class="aspects form">
<?php echo $this->Form->create('Aspect');?>
	<fieldset>
		<legend><?php __('Handlungsaspekt bearbeiten'); ?></legend>
	<?php
		echo $this->Form->input('name',array('size'=>50));
		echo "<div class='input textarea'>";
		echo $this->Form->label('description','Beschreibung');
		echo $this->ck->ckeditor('description');
		echo "</div>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>
