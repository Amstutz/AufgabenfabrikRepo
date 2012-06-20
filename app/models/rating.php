<?php
class Rating extends AppModel {
	var $name = 'Rating';
	var $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'aspect_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie an, welcher Handlungsaspekt nach HarmoS für dies Aufgabe zentral ist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'competency_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie an, welcher Kompetenzbereich nach HarmoS für dies Aufgabe zentral ist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(

		'Aspect' => array(
			'className' => 'Aspect',
			'foreignKey' => 'aspect_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Competency' => array(
			'className' => 'Competency',
			'foreignKey' => 'competency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Exercise' => array(
			'className' => 'Exercise',
			'foreignKey' => 'exercise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

}
?>