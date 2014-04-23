<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 23/04/14
 * Time: 21:10
 */
App::uses('TestHelper', 'Test');

class OfferingSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new OfferingSuite('OfferingTest');
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

class OfferingTest extends PHPUnit_Extensions_Selenium2TestCase{

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');
    }

    public function testAddNewOfferChangePropertyStatus()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("offers")->click();
        $this->byId("make-offer")->click();
        $this->byId("offer-price")->value("12345");
        $this->byId("offer-submit")->click();

        $this->assertNotNull($this->byId('view-button-0'));
        $this->url('http://127.0.1.1/properties/manage/12');
        $this->assertEquals("Offer made", $this->byId("ps")->text());
    }


    public function testAcceptOfferChangePropertyStatusAndRejectOtherOffers()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("offers")->click();
        $this->byId("make-offer")->click();
        $this->byId("offer-price")->value("12345");
        $this->byId("offer-submit")->click();
        $this->byId('view-button-1')->click();
        $this->byId('accept')->click();

        $this->byId("offers")->click();
        $this->byId('view-button-0')->click();

        $this->assertEquals("REJECTED", $this->byId("status")->text());

        $this->url('http://127.0.1.1/properties/manage/12');
        $this->assertEquals("Sold", $this->byId("ps")->text());
    }

    public function testRejectOfferChangePropertyStatus()
    {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("offers")->click();
        $this->byId("make-offer")->click();
        $this->byId("offer-price")->value("12345");
        $this->byId("offer-submit")->click();
        $this->byId('view-button-2')->click();
        $this->byId('reject')->click();

                $this->url('http://127.0.1.1/properties/manage/12');
        $this->assertEquals("For sale", $this->byId("ps")->text());
    }
} 