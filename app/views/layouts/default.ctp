<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php echo $this->Html->charset(); ?>
	<?php $pageName = "home"; ?>
	<title>
		<?php __('Aufgabenfabrik'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

			echo $this->Html->script('Jquery'); // Include jQuery library
			echo $this->Html->script('ckeditor/ckeditor');
?>

</head>

<body>
	<div id="container">
		<!-- -----------------------------------------Header --------------------------------------------------- -->
		<div id="header">
			<div class="titel">	<?php echo $this->Html->image('layout/Titel.png', array('alt'=> __('Aufgabenfabrik',true), 'url' => array('controller' => 'exercises', 'action' => 'index')));?>
			</div>
			<?php echo header('Content-type: text/html; charset=UTF-8');?>
		</div>
		<div class="menuTopHolder">
			<div class="menuTop">

		    <?php 
		     	if($pageName == "home"){echo $this->Html->image('layout/Button_News.png', array('alt'=> __('Statistik',true), 'url' => array('controller' => 'exercises', 'action' => 'stats')));}
				else{echo $this->Html->image('layout/Button_News.png', array('alt'=> __('Statistik',true), 'url' => array('controller' => 'exercises', 'action' => 'stats')));}
				
		        if($pageName == "assignment"){echo $this->Html->image('layout/Button_Desk.png', array('alt'=> __('Aufgaben',true), 'url' => array('controller' => 'exercises', 'action' => 'index')));}
				else{echo $this->Html->image('layout/Button_Desk.png', array('alt'=> __('Aufgaben',true), 'url' => array('controller' => 'exercises', 'action' => 'index')));}
					
				if($pageName == "cart"){echo $this->Html->image('layout/Button_Shop.png', array('alt'=> __('Kasse',true), 'url' => array('controller' => 'carts', 'action' => 'index')));}
				else{echo $this->Html->image('layout/Button_Shop.png', array('alt'=> __('Aufgaben',true), 'url' => array('controller' => 'carts', 'action' => 'index')));}
				

				
				if($admin)
				{
					if($pageName == "users"){echo $this->Html->image('layout/Button_Communitiy.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'index')));}
					else{echo $this->Html->image('layout/Button_Community.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'index')));}
				}
				elseif($logged_in) 
				{
						if($pageName == "users"){echo $this->Html->image('layout/Button_Communitiy.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'view',$users_Id)));}
						else{echo $this->Html->image('layout/Button_Community.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'view',$users_Id)));}					
				}
				else
				{
						if($pageName == "users"){echo $this->Html->image('layout/Button_Communitiy.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'login')));}
						else{echo $this->Html->image('layout/Button_Community.png', array('alt'=> __('Benutzer',true), 'url' => array('controller' => 'users', 'action' => 'login')));}						
				} 
		
			?>
			</div>
		</div>		
		
		<!-- -----------------------------------------Content--------------------------------------------------- -->
		<div id="linksTop"></div>
		<div id="rechtsTop"> </div>
		<div id="inhaltTop"></div>

		 <div id="linksCenter">
		<div id="rechtsCenter"> 
		<div id="inhaltCenter">
		<div id="content">
		<div id="userNav">
		<?php if($logged_in):?>
			Willkommen, <?php  echo $users_username?>, <?php echo $html->link('Abmelden', array('controller' => 'users', 'action'=>'logout'));?>
		<?php else: ?>
			<?php echo $html->link('Registrieren', array('controller' => 'users', 'action'=>'add'));?>
			<?php echo $html->link('Anmelden', array('controller' => 'users', 'action'=>'login'));?>		
		<?php endif; ?>
		</div>
		<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>

	</div>
		</div>
		</div>
		</div>
		</div>

		<div id="linksBottom"></div>
		<div id="rechtsBottom"> </div>
		<div id="inhaltBottom"></div>
		


	
		
		<!-- -----------------------------------------Footer--------------------------------------------------- -->
		
		<div id="footer">
		</div>
	<?php echo $this->element('sql_dump'); 
	echo $this->Js->writeBuffer(array('inline' => 'true')); // Write cached scripts
	?>
</body>
</html>