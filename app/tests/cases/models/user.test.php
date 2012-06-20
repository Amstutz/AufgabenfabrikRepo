<?php
/* User Test cases generated on: 2011-06-24 22:50:07 : 1308948607*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.cart', 'app.item', 'app.exercise', 'app.lug', 'app.aspect', 'app.goal', 'app.competency', 'app.niveau');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

}
?>