<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 23/03/14
 * Time: 20:18
 */

class RequestdetailemptyFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'comment' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'requests_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'date' => array('type' => 'timestamp', 'null' => true, 'default' => 'CURRENT_TIMESTAMP'),
        'indexes' => array(
            'PRIMARY' => array('column' => array('id', 'requests_id'), 'unique' => 1),
            'fk_requestdetails_requests1' => array('column' => 'requests_id', 'unique' => 0)
        ),
        'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
    );

}