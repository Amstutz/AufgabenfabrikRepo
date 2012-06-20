<?php if($view==true)
{ ?>
	<td colspan="8" id='<?php if($class){echo "update";}?>' >
	<h3> Aufgabenstellung</h3>
	<?php echo $content;?>
	<br>
	<hr>
	<br>
	<h3>Lösung</h3>
	<?php echo $solution; ?>
	<br>
	<hr>
	<br>
	<h3>Beschreibung</h3>
	<?php echo $description; ?>	
	<br>
	<hr>
	<br>
	<p>Erstellt von: <?php echo $user;?><br>Zuletzt geändert: <?php echo $modified;?> </p>	
	
	</td>	
<?php }
else {}?>