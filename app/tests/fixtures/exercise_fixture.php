<?php
/* Exercise Fixture generated on: 2011-05-08 21:49:52 : 1304884192 */
class ExerciseFixture extends CakeTestFixture {
	var $name = 'Exercise';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'points' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'class' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'lug_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'aspect_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 50),
		'competence_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 50),
		'goal_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 50),
		'level' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'solution' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'titel_4' => array('column' => 'title', 'unique' => 1), 'lug_Id' => array('column' => array('lug_id', 'aspect_id', 'competence_id', 'goal_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'points' => 1,
			'class' => 1,
			'lug_id' => 1,
			'aspect_id' => 1,
			'competence_id' => 1,
			'goal_id' => 1,
			'level' => 1,
			'solution' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
?>