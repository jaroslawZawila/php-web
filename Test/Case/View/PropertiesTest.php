<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 07/04/14
 * Time: 14:59
 */

App::uses('TestHelper', 'Test');

class PropertiesSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new PropertiesSuite('PropertiesTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();

        $this->conn->initData("init-log.sql");
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}

class PropertiesTest extends PHPUnit_Extensions_Selenium2TestCase
{



    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');


    }

    public function testPropertyIsAdded()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-view")->click();
        $this->byId("view-2")->click();
        $this->byId("properties-tab")->click();
        $this->byId("add-property")->click();


        $this->byId("price")->value('130000');
        $this->byId("yob")->value('2010');
        $this->byId("houseno")->value('1');
        $this->byId("street")->value('Street');
        $this->byId("city")->value('City');
        $this->byId("postcode")->value('xx1 2xx');

        $this->byId("register")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-view")->click();
        $this->byId("view-2")->click();
        $this->byId("properties-tab")->click();
        $this->assertEquals("http://127.0.1.1/properties/manage/23/2", $this->byId('manage-23')->attribute("href"));
    }

    public function testPropertyFailedToAdd()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-view")->click();
        $this->byId("view-2")->click();
        $this->byId("properties-tab")->click();
        $this->byId("add-property")->click();


        $this->byId("price")->value('130000');
        $this->byId("yob")->value('2010');
        $this->byId("houseno")->value('1');
        $this->byId("street")->value('Street');
        $this->byId("city")->value('City');
        $this->byId("postcode")->value('xx12xx');

        $this->byId("register")->click();

        $this->assertEquals("The property could not be saved. Please, try again.", $this->byId('flashMessage')->text());
    }

} 