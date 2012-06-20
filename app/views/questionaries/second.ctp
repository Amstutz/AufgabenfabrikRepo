<div id="first">
	<fieldset>
		<legend>
			<?php __("Fragebogen 2");?>
		</legend>
		<?php echo $this->Form->create('questionary', array('type' => 'post', 'id' => 'table', 'url' => array('controller' => 'questionaries', 'action' => 'second', 2)));?>
		<table  cellpadding="0" cellspacing="0">
			<?php if( ! empty($entries["understand"])){
			?>
			<tr id="cartid" >
				<td width="60%" > 1. Ich habe die Beschreibung des Kompetenzmodells von HarmoS Mathematik im Kurzlehrgang verstanden. </td>
				<td ><?php
				$options = array('4' => 'Stimmt genau (weiter mit Frage 3)', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["understand"]);
				echo $this->Form->radio('understand', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td width="60%" > 1. Ich habe die Beschreibung des Kompetenzmodells von HarmoS Mathematik im Kurzlehrgang verstanden. </td>
				<td ><?php
				$options = array('4' => 'Stimmt genau (weiter mit Frage 3)', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('understand', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["understand"])&& $entries["understand"]==4){
			?>
			<tr bgcolor="#999999">
				<td>2. Welche Teile des Lehrgangs haben Sie nicht vollständig verstanden:  </td>
				<td><?php echo $this->Form->textarea('understandtext', array('id' => 'understandtext', 
				'cols'=>"50", 'rows'=>"10", 'disabled' => 'disabled'));?></td>
			</tr>
			<?php }
			elseif( ! empty($entries["understandtext"])){
			?>
			<tr id="cartid" >
				<td>2. Welche Teile des Lehrgangs haben Sie nicht vollständig verstanden:  </td>
				<td><?php echo $this->Form->textarea('understandtext', array('id' => 'understandtext','cols'=>"50", 'rows'=>"10",  'value' => $entries["understandtext"]));?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td>2. Welche Teile des Lehrgangs haben Sie nicht vollständig verstanden:  </td>
				<td><?php echo $this->Form->textarea('understandtext', array('id' => 'understandtext','cols'=>"50", 'rows'=>"10"));?></td>
			</tr>
			<?php }?>

			<?php if( ! empty($entries["know"])){
			?>
			<tr id="cartid" >
				<td> 3.	Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["know"]);
				echo $this->Form->radio('know', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 3.	Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen.</td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('know', $options, $attributes);
				?></td>
			</tr>
			<?php }?>

			<?php if( ! empty($entries["order"])){
			?>
			<tr id="cartid" >
				<td>4.Ich denke, dass es grundsätzlich möglich ist, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["order"]);
				echo $this->Form->radio('order', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 4.	Ich denke, dass es grundsätzlich möglich ist, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen.</td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('order', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["orderself"])){
			?>
			<tr id="cartid" >
				<td> 5.	Ich denke, dass ich jetzt in der Lage bin, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false,'value' => $entries["orderself"]);
				echo $this->Form->radio('orderself', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 5.	Ich denke, dass ich jetzt in der Lage bin, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('orderself', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["develop"])){
			?>
			<tr id="cartid" >
				<td> 6. Ich denke, dass es grundsätzlich möglich ist, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false,'value' => $entries["develop"]);
				echo $this->Form->radio('develop', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td>6. Ich denke, dass es grundsätzlich möglich ist, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen.</td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('develop', $options, $attributes);
				?></td>
			</tr>
			<?php }?>			
			<?php if( ! empty($entries["developself"])){
			?>
			<tr id="cartid" >
				<td>7. Ich denke, dass ich jetzt in der Lage bin, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["developself"]);
				echo $this->Form->radio('developself', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td>7. Ich denke, dass ich jetzt in der Lage bin, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('developself', $options, $attributes);
				?></td>
			</tr>
			<?php }?>			
			<?php if( ! empty($entries["help"])){
			?>
			<tr id="cartid" >
				<td> 8. Es wäre eine grosse Hilfe für mich, wenn ich Mathematikaufgaben von anderen Lehrpersonen entwickelt und nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik kategorisiert, von einer Online-Plattform herunterladen könnte. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["help"]);
				echo $this->Form->radio('help', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 8.	Es wäre eine grosse Hilfe für mich, wenn ich Mathematikaufgaben von anderen Lehrpersonen entwickelt und nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik kategorisiert, von einer Online-Plattform herunterladen könnte. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('help', $options, $attributes);
				?></td>
			</tr>
			<?php }?>			
			<?php if( ! empty($entries["helpself"])){
			?>
			<tr id="cartid" >
				<td>9. Ich wäre bereit, in Zukunft eigene Mathematikaufgaben nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zu entwickeln und auf einer Online-Plattform anzubieten.  </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["helpself"]);
				echo $this->Form->radio('helpself', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td>9. Ich wäre bereit, in Zukunft eigene Mathematikaufgaben nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zu entwickeln und auf einer Online-Plattform anzubieten. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('helpself', $options, $attributes);
				?></td>
			</tr>
			<?php }?>			
			
			
		
			
			
		</table>
		<?php echo $this->Form->end(__('Weiter zur Kategorisierung der Testaufgaben', true));?>

		<div class="actions">
			<?php echo $this->Html->link(__('Zurück zum Kurzlehrgang', true), array('controller' => 'questionaries', 'action' => 'info'));?>
		</div>
	</fieldset>
</div>
<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function() {$("#table").bind("change", function(event) {$.ajax({
				async : true,
				data : $("#table").closest("form").serialize(),
				dataType : "html",
				success : function(data, textStatus) {$("#first").html(data);
				},
				type : "post",
				url : "\/index.php\/questionaries\/second\/1"
			});
			return false;
		});
	});
	//]]>
</script>
