<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Registrieren'); ?></legend>
		<?php echo $session->flash('auth')?>
	<?php
		echo $this->Form->input('username',array('label'=>'Benutzername'));
		echo $this->Form->input('name',array('label'=>'Name'));
		echo $this->Form->input('mail',array('label'=>'E-Mailadresse','size' => 50));
		echo $this->Form->input('password',array('label'=>'Passwort','size' => 50));
		echo $this->Form->input('password_confirmation',array('label'=>'Passwort Bestätigung','type'=>'password','size' => 50));
		if($admin)
		{
			echo $this->Form->input('group_id', array('label'=>'Benutzergruppe','value'=>'3'));
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
