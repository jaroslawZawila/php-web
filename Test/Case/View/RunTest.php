<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 22/04/14
 * Time: 12:52
 */

App::uses('TestHelper', 'Test');

class RunSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new RunSuite('RequestFormTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();
    }

    protected function tearDown()
    {
//        $this->conn->dropSchema();
    }
}
