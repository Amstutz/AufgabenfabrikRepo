<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Cart' => array(
			'className' => 'Cart',
			'foreignKey' => 'user_id',
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
		'Exercise' => array(
			'className' => 'Exercise',
			'foreignKey' => 'user_id',
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
	
	var $validate = array(
		'name' => array(
			'Bitte geben Sie ihren Namen ein.' => array(
				'rule'=> 'notEmpty',
				'message' =>'Bitte geben Sie ihren Namen ein.')
		),
		'username'=> array(
			'Bitte geben Sie ihren Benutzernamen ein.' => array(
				'rule'=> 'notEmpty',
				'message' =>'Bitte geben Sie ihren Benutzernamen ein.'),		
		'Doppelt' => array(
				'rule'=> 'isUnique',
				'message' =>'Dieser Benutzername ist schon vergeben.')
				),
		'mail' => array(
			'Bitte geben Sie ihren Namen ein.' => array(
				'rule'=> 'notEmpty',
				'message' =>'Bitte geben Sie eine gültige E-Mailadresesse ein.'),
			'Bitte geben Sie ihren Namen ein.' => array(
				'rule'=> array('email',true),
				'message' =>'Bitte geben Sie eine gültige E-Mailadresesse ein.'),				
		),
		'password'=> array(
			'Passwordlength.' => array(
				'rule'=> array('between',4,15),
				'message' =>'Das Passwort muss zwischen 4 und 15 Zeichen beinhalten.'),
			'Passwordmatch' => array(
				'rule' => 'matchPasswords',
				'message' => 'Die Passwörter stimmen nicht überein.')	
		)
	);
	
	function matchPasswords($data){
		if ($data['password']== $this->data['User']['password_confirmation']){
			return true;
		}
		$this->invalidate('password_confirmation','Die Passwörter stimmen nicht überein.');
		return false;
	}
	
	function hashPasswords($data){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], NULL,TRUE);
			return $data;
		}
		return $data;
		}
		
		function beforeSave() {
			$this->hashPasswords(NULL, TRUE);
			return TRUE;
	}

	

	var $belongsTo = array('Group');

	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}
}

?>