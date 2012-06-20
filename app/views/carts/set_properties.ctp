<h2><?php __('Testserien'); ?></h2>

<div class="carts form">
<fieldset>
	<legend><?php __('Eigenschaften'); ?></legend>
<?php echo $this->Form->create('Cart', array('type' => 'post'));?>
	<?php
		echo $this->Form->input('title', array('label' => 'Titel der Testserie','maxLength' => 58, 'size'=>50, 'default'=>$cart['title']));
		echo $this->Form->input('created_from', array('label' => 'Name des Erstellers der Serie','maxLength' => 58, 'size'=>50, 'default'=>$cart['created_from']));
		echo "<div class='input textarea required'>";
		echo $this->Form->label('template','Vorlage');
		$templates = array();
		foreach (glob(APP ."/media/templates/*.docx") as $template) {
			  $template=basename ($template,".docx"); 
    		$templates[$template] = $template;
		}
		echo $this->Form->select('template', $templates,null,array('empty' => false,'default'=>$cart['template'],'id'=>"template"));
		echo "</div>";?>
		<div id="preview_template">
		<p>Beispiel für <?php 	echo $template ?>:</p>
				<?php 	echo $this->Html->image("../../media/templates/preview".$cart['template'].".png",array('widht'=>300,'height'=>420)); ?>	
		</div>
		<?php 	
		if(!empty($cart['show_solution'])){echo $this->Form->input('show_solution',array('empty' => false, 'label' => 'Lösungen anzeigen','type' => 'checkbox','checked'=>1));}
		else {echo $this->Form->input('show_solution',array('empty' => false, 'label' => 'Lösungen anzeigen','type' => 'checkbox'));}
		if(!empty($cart['show_points'])){echo $this->Form->input('show_points',array('empty' => false, 'label' => 'Punkte anzeigen','type' => 'checkbox','checked'=>1));}
		else {echo $this->Form->input('show_points',array('empty' => false, 'label' => 'Punkte anzeigen','type' => 'checkbox'));}
		if(!empty($cart['show_description'])){echo $this->Form->input('show_description',array('empty' => false, 'label' => 'Beschreibung anzeigen','type' => 'checkbox','checked'=>1));}
		else {echo $this->Form->input('show_description',array('empty' => false, 'label' => 'Beschreibung anzeigen','type' => 'checkbox'));}
		echo $this->Form->input('date',array('empty' => false, 'label' => 'Beschreibung anzeigen','default'=>$cart['date'],'type' => 'date','dateFormat'=>'DMY'));
		
		$this->Js->get('#template')->event('change', $this->Js->request( 
			array('action' => 'preview_template'), 
				array( 
					'update' => '#preview_template', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) ) ); 
			
			$this->Js->get('#template')->event('onload', $this->Js->request( 
			array('action' => 'preview_template'), 
				array( 
					'update' => '#preview_template', 
					'async' => true, 
					'dataExpression' => true, 
					'method' => 'post', 
					'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) ) ); 
	?>






<?php echo $this->Form->end(__('Senden', true));?>
</fieldset>
</div>

<div class="actions">
<?php echo $this->Html->link(__('Zurück', true), array('controller' => 'carts', 'action' => 'index')); ?>
</div>
