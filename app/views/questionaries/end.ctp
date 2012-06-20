<h2><?php  __('Herzlichen Dank');?></h2>
<fieldset>
	<legend>
		<?php __("Ende der Untersuchung");?>
	</legend>
				</br>
				</br>
	<p>
		Sie können dieses Fenster schliessen.
	</p>
		</br>
		</br><br/>

	<div class="actions">
		<?php echo $this->Html->link(__('Zurück zu Fragebogen 3', true), array('controller' => 'questionaries', 'action' => 'third',0));?>

	</div>
</fieldset>