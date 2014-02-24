<?php
/**
 * ViewingFixture
 *
 */
class ViewingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'properties_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customers_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'timestamp' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'properties_id', 'customers_id'), 'unique' => 1),
			'fk_viewings_properties1' => array('column' => 'properties_id', 'unique' => 0),
			'fk_viewings_customers1' => array('column' => 'customers_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'properties_id' => 1,
			'customers_id' => 1,
			'status' => 'Lorem ipsum dolor sit amet',
			'date' => 'Lorem ipsum dolor sit amet',
			'timestamp' => 'Lorem ipsum dolor sit amet',
			'comment' => 'Lorem ipsum dolor sit amet'
		),
	);

}
