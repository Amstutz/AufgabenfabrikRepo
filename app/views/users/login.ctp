<div class="users form">
<?php echo $this->Form->create('User', array('acction' => 'login'));?>
	<fieldset>
		<legend><?php __('Anmelden'); ?></legend>
		<?php echo $session->flash('auth')?>
		<?php echo $session->flash()?>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Senden', true));?>
</div>
