<div id="first">
	<fieldset>
		<legend>
			<?php __("Fragebogen 3");?>
		</legend>
		<?php echo $this->Form->create('questionary', array('type' => 'post', 'id' => 'table','url'=>array('controller' => 'questionaries', 'action' => 'third', 2)));?>
		<table  cellpadding="0" cellspacing="0">
			<?php if( ! empty($entries["know"])){
			?>
			<tr id="cartid" >
				<td> 1.	Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen. </td>
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
				<td> 1.	Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen.</td>
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
				<td>2.Ich denke, dass es grundsätzlich möglich ist, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
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
				<td> 2.	Ich denke, dass es grundsätzlich möglich ist, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen.</td>
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
				<td> 3.	Ich denke, dass ich jetzt in der Lage bin, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["orderself"]);
				echo $this->Form->radio('orderself', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 3.	Ich denke, dass ich jetzt in der Lage bin, vorhandene Mathematikaufgaben den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zuzuordnen. </td>
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
				<td> 4. Ich denke, dass es grundsätzlich möglich ist, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["develop"]);
				echo $this->Form->radio('develop', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td>4. Ich denke, dass es grundsätzlich möglich ist, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen.</td>
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
				<td>5. Ich denke, dass ich jetzt in der Lage bin, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
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
				<td>5. Ich denke, dass ich jetzt in der Lage bin, Mathematikaufgaben zu entwickeln, welche einen bestimmten Handlungsaspekt und Kompetenzbereich von HarmoS Mathematik testen. </td>
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
				<td> 6. Es wäre eine grosse Hilfe für mich, wenn ich Mathematikaufgaben von anderen Lehrpersonen entwickelt und nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik kategorisiert, von einer Online-Plattform herunterladen könnte. </td>
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
				<td> 6.	Es wäre eine grosse Hilfe für mich, wenn ich Mathematikaufgaben von anderen Lehrpersonen entwickelt und nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik kategorisiert, von einer Online-Plattform herunterladen könnte. </td>
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
				<td>7. Ich wäre bereit, in Zukunft eigene Mathematikaufgaben nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zu entwickeln und auf einer Online-Plattform anzubieten. </td>
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
				<td>7. Ich wäre bereit, in Zukunft eigene Mathematikaufgaben nach den Handlungsaspekten und Kompetenzbereichen von HarmoS Mathematik zu entwickeln und auf einer Online-Plattform anzubieten. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('helpself', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["say"])){
			?>
			<tr  id="cartid" >
				<td>8. Was ich noch sagen wollte: </td>
				<td><?php echo $this->Form->textarea('say', array('id' => 'say', 'value' => $entries["say"],'cols'=>"50", 'rows'=>"10"));?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr  id="cartid" >
				<td>8. Was ich noch sagen wollte: </td>
				<td><?php echo $this->Form->textarea('say', array('id' => 'say','cols'=>"50", 'rows'=>"10"));?></td>
			</tr>
			<?php }?>
		</table>
		<?php echo $this->Form->end(__('Fertigstellen', true));?>

		<div class="actions">
			<?php echo $this->Html->link(__('Zurück zur Kategorisierung der Testaufgaben', true), array('controller' => 'ratings', 'action' => 'back'));?>
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
				url : "\/index.php\/questionaries\/third\/1"
			});
			return false;
		});
	});
	//]]>
</script>
