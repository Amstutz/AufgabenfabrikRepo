<?php
class Goal extends AppModel {
	var $name = 'Goal';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie dem Handlungsaspekt einen Namen.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Dieser Name wird schon verwendet, bitte geben Sie einen anderen Namen ein.',
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
	
	
	
	var $belongsTo = array(
		'Competency' => array(
			'className' => 'Competency',
			'foreignKey' => 'competency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aspect' => array(
			'className' => 'Aspect',
			'foreignKey' => 'aspect_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'foreignKey' => 'goal_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>