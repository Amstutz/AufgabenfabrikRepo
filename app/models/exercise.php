<?php
class Exercise extends AppModel {
	var $name = 'Exercise';
	var $displayField = 'title';
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
			'n' => array(
				'rule' => array('n'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie der Aufgabe einen Titel.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Dieser Titel wird schon verwendet, bitte geben Sie einen anderen Titel ein.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(

		),
		'points' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie an, wie viele Punkte diese Aufgabe wert ist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				'numieric' => array(
				'rule' => array('numeric'),
				'message' => 'Bitte geben Sie an, wie viele Punkte diese Aufgabe wert ist.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'class' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Geben Sie Bitte eine Klassenstufe zwischen 1 und 9 an.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'decimal' => array(
				'rule' => array('numeric'),
				'message' => 'Geben Sie Bitte eine Klassenstufe zwischen 1 und 9 an.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				'greater' => array(
				'rule' => array('comparison','>=', 1),
				'message' => 'Geben Sie Bitte eine Klassenstufe zwischen 1 und 9 an.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
					'smaller' => array(
				'rule' => array('comparison','<=', 9),
				'message' => 'Geben Sie Bitte eine Klassenstufe zwischen 1 und 9 an.',
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
		'goal_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie den Standart nach HarmoS an, welcher für diese Aufgabe im Vorgergrund steht.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'niveau_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bitte geben Sie den Schwierigkeitsgrad der Aufgabe an.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'solution' => array(

		),
		'modified' => array(

		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Lug' => array(
			'className' => 'Lug',
			'foreignKey' => 'lug_id',
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
		'Goal' => array(
			'className' => 'Goal',
			'foreignKey' => 'goal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Niveau' => array(
			'className' => 'Niveau',
			'foreignKey' => 'niveau_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	var $hasMany = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'exercise_id',
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