<?php
/* Exercises Test cases generated on: 2011-05-08 21:54:50 : 1304884490*/
App::import('Controller', 'Exercises');

class TestExercisesController extends ExercisesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ExercisesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.exercise', 'app.lug', 'app.aspect', 'app.competency', 'app.goal', 'app.cart', 'app.solution');

	function startTest() {
		$this->Exercises =& new TestExercisesController();
		$this->Exercises->constructClasses();
	}

	function endTest() {
		unset($this->Exercises);
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