<?php
App::uses('AppModel', 'Model');
/**
 * Viewing Model
 *
 * @property Properties $Properties
 * @property Customers $Customers
 */
class Viewing extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'properties_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customers_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public function get_viewings($id) {
        return $this->find('all', array('conditions'=>array('Viewing.customers_id' => $id),
                                        'order' => array('Viewing.date DESC')));
    }

    public function get_viewings_all() {
        return $this->find('all', array('order' => array('Viewing.date DESC')));
    }


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
