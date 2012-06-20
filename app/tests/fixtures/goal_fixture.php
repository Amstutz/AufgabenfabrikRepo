<?php
/* Goal Fixture generated on: 2011-05-09 19:21:15 : 1304961675 */
class GoalFixture extends CakeTestFixture {
	var $name = 'Goal';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'competency_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'index'),
		'aspect_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 1), 'kompetenzbereich_Id' => array('column' => array('competency_id', 'aspect_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'competency_id' => 1,
			'aspect_id' => 1
		),
	);
}
?>