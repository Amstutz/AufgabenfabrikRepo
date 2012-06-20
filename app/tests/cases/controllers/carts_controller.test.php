<?php
/* Carts Test cases generated on: 2011-06-16 13:03:17 : 1308222197*/
App::import('Controller', 'Carts');

class TestCartsController extends CartsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CartsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.cart', 'app.user', 'app.item');

	function startTest() {
		$this->Carts =& new TestCartsController();
		$this->Carts->constructClasses();
	}

	function endTest() {
		unset($this->Carts);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>