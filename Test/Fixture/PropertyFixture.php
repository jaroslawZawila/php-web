<?php
/**
 * PropertyFixture
 *
 */
class PropertyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null),
		'beds' => array('type' => 'integer', 'null' => false, 'default' => null),
		'baths' => array('type' => 'integer', 'null' => false, 'default' => null),
		'garden' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'parking' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hometype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'featured' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hide' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'postcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'houseno' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'street' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'customers_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'addtype' => array('type' => 'string', 'null' => false, 'default' => 'sale', 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_properties_customers1' => array('column' => 'customers_id', 'unique' => 0)
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
			'price' => 1,
			'beds' => 1,
			'baths' => 1,
			'garden' => 'Yes',
			'parking' => 'Yes',
			'hometype' => 'House',
			'year' => 1,
			'status' => 'On market',
			'featured' => 'No',
			'hide' => 'yes',
			'description' => 'Desciptio',
			'postcode' => 'BS57TR',
			'houseno' => '20',
			'street' => 'Speedwell',
			'city' => 'City',
			'customers_id' => 1,
			'addtype' => 'sale'
		),
        array(
            'id' => 2,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'no',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 3,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'PS5 7TP',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 4,
            'price' => 1,
            'beds' => 5,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 5,
            'price' => 5,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 6,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'flat',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 7,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 8,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 9,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 10,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'No',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        ),
        array(
            'id' => 11,
            'price' => 1,
            'beds' => 1,
            'baths' => 1,
            'garden' => 'Yes',
            'parking' => 'Yes',
            'hometype' => 'House',
            'year' => 1,
            'status' => 'On market',
            'featured' => 'Yes',
            'hide' => 'yes',
            'description' => 'Desciptio',
            'postcode' => 'BS57TR',
            'houseno' => '20',
            'street' => 'Speedwell',
            'city' => 'City',
            'customers_id' => 1,
            'addtype' => 'sale'
        )
	);

}
