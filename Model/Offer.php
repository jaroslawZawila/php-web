<?php
App::uses('AppModel', 'Model');
/**
 * Offer Model
 *
 * @property Properties $Properties
 * @property Customers $Customers
 */
class Offer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'properties_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'customers_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'Properties' => array(
			'className' => 'Properties',
			'foreignKey' => 'properties_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Customers' => array(
			'className' => 'Customers',
			'foreignKey' => 'customers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
