<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 23/03/14
 * Time: 18:10
 */

App::uses('Request', 'Model');


class RequestPlusFixture extends CakeTestFixture {

    public $name = "Request";
    public $table = 'requests';
    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'message' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'status' => array('type' => 'string', 'null' => false, 'default' => 'NEW', 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
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
            'name' => 'test name1',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Seller',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:15'
        ),array(
            'id' => 2,
            'name' => 'test name2',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Landlord',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:20'
        ),array(
            'id' => 3,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 4,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 5,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 6,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 7,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 8,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 9,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 10,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 11,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),array(
            'id' => 12,
            'name' => 'test name3',
            'email' => 'test@email.com',
            'phone' => '1234567890',
            'type' => 'Buyer',
            'message' => 'test message',
            'date' => '2014-03-08 17:31:17'
        ),
    );

}