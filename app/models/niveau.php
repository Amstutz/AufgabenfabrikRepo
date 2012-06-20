<?php
class Niveau extends AppModel {
	var $name = 'Niveau';
	var $displayField = 'level';
	var $validate = array(
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Das Kompetenzniveau muss eine Zahl sein.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Das Kompetenzniveau muss eine Zahl sein.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'level'=> array(
				'rule' => array('isUnique'),
				'message' => 'Dieses Kompetenzniveau wird schon verwendet, bitte geben Sie einen anderen Namen ein.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'foreignKey' => 'niveau_id',
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