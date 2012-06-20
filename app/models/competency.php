<?php
class Competency extends AppModel {
	var $name = 'Competency';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie dem Kompetenzbereich einen Namen.',
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
			)
	);
	var $hasMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'foreignKey' => 'competency_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Goal' => array(
			'className' => 'Goal',
			'foreignKey' => 'competency_id',
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