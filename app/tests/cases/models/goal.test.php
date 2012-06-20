<?php
/* Goal Test cases generated on: 2011-05-09 19:21:15 : 1304961675*/
App::import('Model', 'Goal');

class GoalTestCase extends CakeTestCase {
	var $fixtures = array('app.goal', 'app.competency', 'app.aspect', 'app.exercise', 'app.lug', 'app.cart', 'app.solution');

	function startTest() {
		$this->Goal =& ClassRegistry::init('Goal');
	}

	function endTest() {
		unset($this->Goal);
		ClassRegistry::flush();
	}

}
?>