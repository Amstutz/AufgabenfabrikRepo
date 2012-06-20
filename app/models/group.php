<?php
class Group extends AppModel {
	var $name = 'Group';
	var $displayField = 'name';
	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
		return null;
	}

	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
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