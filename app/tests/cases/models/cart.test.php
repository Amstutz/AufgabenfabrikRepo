<?php
/* Cart Test cases generated on: 2011-06-16 11:57:09 : 1308218229*/
App::import('Model', 'Cart');

class CartTestCase extends CakeTestCase {
	var $fixtures = array('app.cart', 'app.exercise', 'app.lug', 'app.aspect', 'app.goal', 'app.competency', 'app.user', 'app.niveau');

	function startTest() {
		$this->Cart =& ClassRegistry::init('Cart');
	}

	function endTest() {
		unset($this->Cart);
		ClassRegistry::flush();
	}

}
?>