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

    public function testDescriptionIsAddedToProperty()
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
        $this->byId('description-tab')->click();

        $this->assertEquals("", $this->byId('PropertyDescription')->value());

        $this->byId('PropertyDescription')->value("test value");
        $this->byId('update-description')->click();

        $this->assertEquals("test value", $this->byId('PropertyDescription')->value());
    }

    public function testPropertyDetailsAreEdited()
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

        $this->assertEquals("sale", $this->byId('pat')->text());
        $this->assertEquals("bedside", $this->byId('pr')->text());
        $this->assertEquals("1", $this->byId('pb')->text());
        $this->assertEquals("no", $this->byId('pp')->text());
        $this->assertEquals("no", $this->byId('pg')->text());
        $this->assertEquals("130000", $this->byId('price')->text());
        $this->assertEquals("house", $this->byId('pt')->text());
        $this->assertEquals("2010", $this->byId('pyob')->text());
        $this->assertEquals("for sale", $this->byId('ps')->text());
        $this->assertEquals("no", $this->byId('ph')->text());
        $this->assertEquals("no", $this->byId('pf')->text());

        $this->currentWindow()->maximize();
        $this->byId("edit-property")->click();
        sleep(1);
        $this->select($this->byId("eptype"))->selectOptionByValue('let');
        $this->byId("epprice")->value('0');
        $this->select($this->byId("epr"))->selectOptionByValue('2');
        $this->select($this->byId("epb"))->selectOptionByValue('3');
        $this->select($this->byId("epg"))->selectOptionByValue('yes');
        $this->select($this->byId("epp"))->selectOptionByValue('yes');
        $this->select($this->byId("epb"))->selectOptionByValue('3');
        $this->select($this->byId("ept"))->selectOptionByValue('flat');
        $this->select($this->byId("epb"))->selectOptionByValue('3');
        $this->select($this->byId("epf"))->selectOptionByValue('yes');
        $this->select($this->byId("epv"))->selectOptionByValue('yes');

        $this->byId("epprice")->value('0');

        $this->byId("epu")->click();

        $this->assertEquals("let", $this->byId('pat')->text());
        $this->assertEquals("2", $this->byId('pr')->text());
        $this->assertEquals("3", $this->byId('pb')->text());
        $this->assertEquals("yes", $this->byId('pp')->text());
        $this->assertEquals("yes", $this->byId('pg')->text());
        $this->assertEquals("13000000", $this->byId('price')->text());
        $this->assertEquals("flat", $this->byId('pt')->text());
        $this->assertEquals("2010", $this->byId('pyob')->text());
        $this->assertEquals("to let", $this->byId('ps')->text());
        $this->assertEquals("yes", $this->byId('ph')->text());
        $this->assertEquals("yes", $this->byId('pf')->text());

        $this->assertEquals("The property has been saved.", $this->byId('flashMessage')->text());
    }
} 