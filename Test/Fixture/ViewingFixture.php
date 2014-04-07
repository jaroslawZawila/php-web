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
			'status' => 'NEW',
			'date' => '12/12/2014 12:20',
			'timestamp' => 'timestamp',
			'comment' => 'Comment'
		),
        array(
            'id' => 2,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 3,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 4,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 5,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 6,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 7,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 8,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 9,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),
        array(
            'id' => 10,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),array(
            'id' => 11,
            'properties_id' => 1,
            'customers_id' => 1,
            'status' => 'NEW',
            'date' => '12/12/2014 12:20',
            'timestamp' => 'timestamp',
            'comment' => 'Comment'
        ),

	);

}
