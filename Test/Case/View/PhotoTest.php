<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 07/04/14
 * Time: 19:23
 */

App::uses('TestHelper', 'Test');

class PhotoSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new PhotoSuite('PhotoTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();

        $this->conn->initData("init-photo.sql");
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}


class PhotoTest extends PHPUnit_Extensions_Selenium2TestCase
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

        $this->byId("menu-properties")->click();
        $this->byId("manage-12")->click();
        $this->byId("photo-tab")->click();
        $this->byId("delete-3")->click();

        $this->acceptAlert();
        sleep(1);

        $this->byId("photo-tab")->click();
        $this->assertEquals("Sorry there are not pictures for this properties.", $this->byId('alert')->text());

    }

} 