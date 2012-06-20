		<?php 
		$id = (int)$id;
		$idLayout = null; 
		if(!$add)
		{		
							$postAdd =1;
							if ($altrow) {
								$idLayout = ' id="altrowid"';
							}
							else 
							{
								$idLayout = ' id="rowid"';
							}

		}
		else 
		{
			$postAdd =0;
			$idLayout = ' id="cartid"';
		}?>

		<td <?php echo $idLayout?>>
			<?php echo $exercise['Exercise']['title']; ?>&nbsp;
		</td>
		<td <?php echo $idLayout?>>
			<?php echo $exercise['Exercise']['class']; ?>&nbsp;
		</td>
		<!-- <td <?php echo $idLayout?>>
			<?php echo $this->Html->link($exercise['Lug']['name'], array('controller' => 'lugs', 'action' => 'view', $exercise['Lug']['id'])); ?>
		</td>-->
		<td <?php echo $idLayout?>>
			<?php echo $this->Html->link($exercise['Aspect']['name'], array('controller' => 'aspects', 'action' => 'view', $exercise['Aspect']['id'])); ?>
		</td>
		<td <?php echo $idLayout?>>
			<?php echo $this->Html->link($exercise['Competency']['name'], array('controller' => 'competencies', 'action' => 'view', $exercise['Competency']['id'])); ?>
		</td>
		<td <?php echo $idLayout?>>
			<?php echo $this->Html->link($exercise['Goal']['name'], array('controller' => 'goals', 'action' => 'view', $exercise['Goal']['id'])); ?>
		</td>-
		<td <?php echo $idLayout?>><?php echo $this->Html->link($exercise['Niveau']['level'], array('controller' => 'Niveaus', 'action' => 'view', $exercise['Niveau']['id'])); ?>&nbsp;</td>
		<td class="actions" <?php echo $idLayout?>>
			<?php echo "<a id=\"".$id."\" >";?>
			<?php echo $this->Html->image('layout/Document.png', array('id'=>$id ,'alt'=> __('Vorschau',true))); ?>
			<?php echo $this->Html->image('layout/Document-Preview.png', array('alt'=>'Öffnen', 'url' => array('action' => 'view', $id))); ?>	
			<?php 
			if( !$add)
			{
				echo "<a id=\"addCart".$id."\" >";
				echo $this->Html->image('layout/File-New.png', array('id'=>"addCart".$id ,'alt'=>'Hinzufügen')); 
				echo "</a>"; 
			}
			else 
			{
				echo "<a id=\"deleteCart".$id."\" >";
				echo $this->Html->image('layout/File-Delete.png', array('id'=>"deleteCart".$id ,'alt'=>'Löschen'));		
				echo "</a>";
			}
			?>
			<?php 
			if($admin)
			{
				echo $this->Html->image('layout/Edit-Document.png', array('alt'=> __('Bearbeiten',true), 'url' => array('controller' => 'exercises', 'action' => 'edit', $id)));				
			}
			?>
		</td>
			
		<script type="text/javascript">			
//<!-- [CDATA[
$(document).ready(function () {$("#<?php echo $id; ?>").bind("click", function (event) {$.ajax({async:true, dataType:"html", success:function (data, textStatus) {$("#<?php echo "add".$id; ?>").html(data);}, type:"get", url:"\/index.php\/exercises\/view_content\/<?php echo $id; ?>\/<?php echo $altrow; ?>"});});
return false;});
$(document).ready(function () {$("#<?php echo "addCart".$id; ?>").bind("click", function (event) {$.ajax({async:true, dataType:"html", success:function (data, textStatus) {$("#<?php echo "cart".$id; ?>").html(data);}, type:"get", url:"\/index.php\/exercises\/to_cart\/<?php echo $id; ?>\/<?php echo $postAdd; ?>\/<?php echo $altrow; ?>"});});
return false;});
$(document).ready(function () {$("#<?php echo "deleteCart".$id; ?>").bind("click", function (event) {$.ajax({async:true, dataType:"html", success:function (data, textStatus) {$("#<?php echo "cart".$id; ?>").html(data);}, type:"get", url:"\/index.php\/exercises\/to_cart\/<?php echo $id; ?>\/<?php echo $postAdd; ?>\/<?php echo $altrow; ?>"});});
return false;});
//]] -->
</script>

			
			





			









					


					