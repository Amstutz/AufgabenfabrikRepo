<div class="users form">

<?php echo $this->Form->create('User',array('controller' => 'users','action' => 'edit'));?>
	<fieldset>
		<legend><?php __("Konto bearbeiten"); ?></legend>
	<?php
		//echo $this->Form->input('username',array('label'=>'Benutzername'));
		echo $this->Form->input('name',array('label'=>'Name'));
		echo $this->Form->input('mail',array('label'=>'E-Mailadresse','size' => 50));
		echo $this->Form->input('password',array('label'=>'Neues Passwort','size' => 50));
		echo $this->Form->input('password_confirmation',array('label'=>'Neues Passwort bestätigen','type'=>'password','size' =>50));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>
