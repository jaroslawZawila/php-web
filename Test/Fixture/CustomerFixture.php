<?php
/**
 * CustomerFixture
 *
 */
class CustomerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'firstname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'postcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'houseno' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'street' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'type' => 'Buyer',
			'firstname' => 'Name',
			'surname' => 'Surname',
			'postcode' => 'BS4 7TP',
			'houseno' => '15',
			'street' => 'Street',
			'city' => 'City'
		),
        array(
            'id' => 2,
            'type' => 'Tenant',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 3,
            'type' => 'Seller',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 4,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 5,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 6,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 7,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 8,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 9,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),array(
            'id' => 10,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 11,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
        array(
            'id' => 12,
            'type' => 'Buyer',
            'firstname' => 'Name',
            'surname' => 'Surname',
            'postcode' => 'BS4 7TP',
            'houseno' => '15',
            'street' => 'Street',
            'city' => 'City'
        ),
	);

}
