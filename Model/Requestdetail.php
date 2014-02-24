<?php
App::uses('AppModel', 'Model');
/**
 * Requestdetail Model
 *
 * @property Requests $Requests
 */
class Requestdetail extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'comment' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Requests' => array(
			'className' => 'Requests',
			'foreignKey' => 'requests_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
