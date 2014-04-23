<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 07/04/14
 * Time: 13:04
 */
App::uses('TestHelper', 'Test');

class CustomerSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new CustomerSuite('CustomerTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();

//        $this->conn->initData("init-log.sql");
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}

class CustomerTest extends PHPUnit_Extensions_Selenium2TestCase
{



    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');


    }


    public function testCustomerIsAdded()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-add")->click();

        $this->byId("firstname")->value('firstname');
        $this->byId("surname")->value('surname');
        $this->byId("email")->value('email@email.com');
        $this->byId("phone")->value('123456');
        $this->byId("houseno")->value('1');
        $this->byId("street")->value('Street');
        $this->byId("city")->value('City');
        $this->byId("postcode")->value('xx1 2xx');

        $this->byId("register")->click();

        $this->assertEquals("The customer has been saved.", $this->byId('flashMessage')->text());
    }

    public function testCustomerCannotBeAdded()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-add")->click();

        $this->byId("firstname")->value('firstname');
        $this->byId("surname")->value('surname');
        $this->byId("email")->value('email@email.com');
        $this->byId("phone")->value('123456');
        $this->byId("houseno")->value('1');
        $this->byId("street")->value('Street');
        $this->byId("city")->value('City');
        $this->byId("postcode")->value('xx12xx');

        $this->byId("register")->click();

        $this->assertEquals("The customer could not be saved. Please, try again.", $this->byId('flashMessage')->text());
    }
} 