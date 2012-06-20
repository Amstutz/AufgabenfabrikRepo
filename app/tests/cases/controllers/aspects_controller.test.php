<?php
/* Aspects Test cases generated on: 2011-06-15 11:13:39 : 1308129219*/
App::import('Controller', 'Aspects');

class TestAspectsController extends AspectsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AspectsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.aspect', 'app.exercise', 'app.lug', 'app.competency', 'app.goal', 'app.user', 'app.niveau', 'app.cart');

	function startTest() {
		$this->Aspects =& new TestAspectsController();
		$this->Aspects->constructClasses();
	}

	function endTest() {
		unset($this->Aspects);
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