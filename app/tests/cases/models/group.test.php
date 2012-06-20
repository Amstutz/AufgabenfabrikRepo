<?php
/* Group Test cases generated on: 2011-06-28 21:41:43 : 1309290103*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $fixtures = array('app.group', 'app.user', 'app.cart', 'app.item', 'app.exercise', 'app.lug', 'app.aspect', 'app.goal', 'app.competency', 'app.niveau');

	function startTest() {
		$this->Group =& ClassRegistry::init('Group');
	}

	function endTest() {
		unset($this->Group);
		ClassRegistry::flush();
	}

}
?>