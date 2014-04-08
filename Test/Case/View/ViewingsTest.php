<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 08/04/14
 * Time: 20:26
 */

App::uses('TestHelper', 'Test');

class ViewingsSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new ViewingsSuite('ViewingsTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();

        $this->conn->initData("init-viewings.sql");
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}

class ViewingsTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');
    }

    public function testPhotoDeletion()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("menu-customer")->click();
        $this->byId("menu-customer-view")->click();
        $this->byId("view-2")->click();
        $this->byId("viewings-tab")->click();
        $this->byId("add-viewings")->click();
        sleep(1);

        $this->byId("ViewingComment")->value('comment');
        $this->byId("submit-viewing")->click();

        sleep(1);

        $this->byId("viewings-tab")->click();
        $this->assertEquals("http://127.0.1.1/viewings/edit/34", $this->byId('manage-34')->attribute("href"));

    }
} 