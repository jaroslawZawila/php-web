<?php
/**
 * OfferFixture
 *
 */
class OfferFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'properties_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customers_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'properties_id', 'customers_id'), 'unique' => 1),
			'fk_offers_properties1' => array('column' => 'properties_id', 'unique' => 0),
			'fk_offers_customers1' => array('column' => 'customers_id', 'unique' => 0)
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
			'price' => 1,
			'status' => 'NEW',
			'comment' => 'Comment'
		),
	);

}
