<div id="first">
	<fieldset>
		<legend>
			<?php __("Fragebogen 1");?>
		</legend>
		<?php echo $this->Form->create('questionary', array('type' => 'post', 'id' => 'table', 'url' => array('controller' => 'questionaries', 'action' => 'first', 2)));?>
		<table  cellpadding="0" cellspacing="0">
			<?php if( ! empty($entries["gender"])){
			?>
			<tr id="cartid" >
				<td width="60%" > 1. Geben Sie ihr Geschlecht an: </td>
				<td ><?php
				$options = array('2' => 'Männlich', '1' => 'Weiblich');
				$attributes = array('legend' => false, 'value' => $entries["gender"]);
				echo $this->Form->radio('gender', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td width="60%"> 1. Geben Sie ihr Geschlecht an: </td>
				<td><?php
				$options = array('2' => 'Männlich', '1' => 'Weiblich');
				$attributes = array('legend' => false);
				echo $this->Form->radio('gender', $options, $attributes);
				?></td>
			</tr>
			<?php }?>

			<?php if( ! empty($entries["age"])){
			?>
			<tr id="cartid" >
				<td> 2. Geben Sie ihr Alter an: </td>
				<td><?php echo $this->Form->text('age', array('maxLength' => 3, 'size' => 3, 'value' => $entries["age"]));?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 2. Geben Sie ihr Alter an: </td>
				<td><?php echo $this->Form->text('age', array('maxLength' => 3, 'size' => 3));?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["exp"])){
			?>
			<tr id="cartid" >
				<td> 3. Wie viele Jahre unterrichten Sie bereits an einer Sekundarstufe I? </td>
				<td><?php echo $this->Form->text('exp', array('maxLength' => 3, 'size' => 3, 'value' => $entries["exp"]));?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 3. Wie viele Jahre unterrichten Sie bereits an einer Sekundarstufe I? </td>
				<td><?php echo $this->Form->text('exp', array('maxLength' => 3, 'size' => 3));?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["mathExp"])){
			?>
			<tr id="cartid" >
				<td> 4. Wie viele Jahre davon haben Sie auch Mathematik unterrichtet? </td>
				<td><?php echo $this->Form->text('mathExp', array('maxLength' => 3, 'size' => 3, 'value' => $entries["mathExp"]));?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 4. Wie viele Jahre davon haben Sie auch Mathematik unterrichtet? </td>
				<td><?php echo $this->Form->text('mathExp', array('maxLength' => 3, 'size' => 3));?></td>
			</tr>
			<?php }?>

			<?php if( ! empty($entries["math"])){
			?>
			<tr id="cartid" >
				<td width="60%" >5. Über welche Fachdidaktische Ausbildung für Mathematik an der Sekundarstufe I verfügen Sie?</td>
				<td ><?php
				$options = array('3' => 'Fachdidaktik Mathematik abgeschlossen',  '2' => 'In Ausbildung','1' => 'Keine');
				$attributes = array('legend' => false, 'value' => $entries["math"]);
				echo $this->Form->radio('math', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td width="60%" >5. Über welche Fachdidaktische Ausbildung für Mathematik an der Sekundarstufe I verfügen Sie?</td>
				<td><?php
				$options = array('3' => 'Fachdidaktik Mathematik abgeschlossen',  '2' => 'In Ausbildung','1' => 'Keine');
				$attributes = array('legend' => false);
				echo $this->Form->radio('math', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["expHarm"])){
			?>
			<tr id="cartid" >
				<td> 6. Ich habe mich bereits mit dem Kompetenzmodell von HarmoS Mathematik auseinandergesetzt: </td>
				<td><?php
				$options = array('2' => 'Ja', '1' => 'Nein (weiter mit Frage 9)');
				$attributes = array('legend' => false, 'value' => $entries["expHarm"]);
				echo $this->Form->radio('expHarm', $options, $attributes);
				?>

			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 6. Ich habe mich bereits mit dem Kompetenzmodell von HarmoS Mathematik auseinandergesetzt: </td>
				<td><?php
				$options = array('2' => 'Ja', '1' => 'Nein (weiter mit Frage 9)');
				$attributes = array('legend' => false);
				echo $this->Form->radio('expHarm', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["expHarm"]) && $entries["expHarm"]==1){
			?>
			<tr bgcolor="#999999">
				<td> 7. Ich weiss was Handlungsaspekte in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen: </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => null, 'disabled' => 'disabled');
				echo $this->Form->radio('aspects', $options, $attributes);
				?></td>
			</tr>
			<?php }
				elseif(! empty($entries["aspects"]))
				{
			?>
			<tr id="cartid" >
				<td> 7. Ich weiss was Handlungsaspekte in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen: </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["aspects"]);
				echo $this->Form->radio('aspects', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 7. Ich weiss was Handlungsaspekte in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen: </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('aspects', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["expHarm"]) && $entries["expHarm"]==1){
			?>
			<tr bgcolor="#999999">
				<td> 8. Ich weiss was Kompetenzbereiche in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => null, 'disabled' => 'disabled');
				echo $this->Form->radio('competencies', $options, $attributes);
				?></td>
			</tr>
			<?php }
				elseif( ! empty($entries["competencies"])){
			?>
			<tr id="cartid" >
				<td> 8. Ich weiss was Kompetenzbereiche in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["competencies"]);
				echo $this->Form->radio('competencies', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 8. Ich weiss was Kompetenzbereiche in Bezug auf das Kompetenzmodell von HarmoS Mathematik darstellen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('competencies', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["cat"])){
			?>
			<tr id="cartid" >
				<td> 9. Ich habe bereits versucht, Mathematikaufgaben nach Handlungsaspekt und Kompetenzbereich zu kategorisieren. </td>
				<td><?php
				$options = array('2' => 'Ja', '1' => 'Nein');
				$attributes = array('legend' => false, 'value' => $entries["cat"]);
				echo $this->Form->radio('cat', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 9. Ich habe bereits versucht, Mathematikaufgaben nach Handlungsaspekt und Kompetenzbereich zu kategorisieren. </td>
				<td><?php
				$options = array('2' => 'Ja', '1' => 'Nein');
				$attributes = array('legend' => false);
				echo $this->Form->radio('cat', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["know"])){
			?>
			<tr id="cartid" >
				<td> 10. Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen. </td>
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
				<td> 10. Mathematiklehrpersonen sollten das Kompetenzmodell von HarmoS Mathematik kennen. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('know', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
			<?php if( ! empty($entries["learn"])){
			?>
			<tr id="cartid" >
				<td> 11. Ich hoffe, durch die Teilnahme an dieser Untersuchung mein Wissen über das Kompetenzmodell von HarmoS zu erweitern. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false, 'value' => $entries["learn"]);
				echo $this->Form->radio('learn', $options, $attributes);
				?></td>
			</tr>
			<?php }
				else
				{
			?>
			<tr bgcolor="#FF7777">
				<td> 11. Ich hoffe, durch die Teilnahme an dieser Untersuchung mein Wissen über das Kompetenzmodell von HarmoS zu erweitern. </td>
				<td><?php
				$options = array('4' => 'Stimmt genau', '3' => 'Stimmt eher', '2' => 'Stimmt eher nicht', '1' => 'Stimmt überhaupt nicht');
				$attributes = array('legend' => false);
				echo $this->Form->radio('learn', $options, $attributes);
				?></td>
			</tr>
			<?php }?>
		</table>
		<?php echo $this->Form->end(__('Weiter zum Kurzlehrgang', true));?>

		<div class="actions">
			<?php echo $this->Html->link(__('Zurück zum Start', true), array('controller' => 'questionaries', 'action' => 'start'));?>
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
				url : "\/index.php\/questionaries\/first\/1"
			});
			return false;
		});
	});
	//]]>
</script>
