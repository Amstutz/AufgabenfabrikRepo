<?php
/* Cart Fixture generated on: 2011-06-16 11:57:08 : 1308218228 */
class CartFixture extends CakeTestFixture {
	var $name = 'Cart';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'exercise_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'index'),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'hilfe_Id' => array('column' => 'exercise_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'exercise_id' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-06-16 11:57:08',
			'modified' => '2011-06-16 11:57:08'
		),
	);
}
?>