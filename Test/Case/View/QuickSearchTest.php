<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 31/03/14
 * Time: 18:47
 */

App::uses('TestHelper', 'Test');

class QuickSearchSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new QuickSearchSuite('QuickSearchTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();

        $this->conn->initData("quick-search.sql");
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}

class QuickSearchTest extends PHPUnit_Extensions_Selenium2TestCase
{



    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');

    }

    protected function tearDown() {
//        $this->conn->cleanData('properties');
//        $this->conn->cleanData('customers');
    }

    public function testClickSellRedirectAndDisplayPropertiesForSale()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("http://127.0.1.1/properties/view/1", $this->byId('rlink-1')->attribute("href"));
    }

    public function testClickSellRedirectAndDisplayPropertiesForLet()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("quick-let")->click();

        $this->assertEquals("To let:", $this->byId('search-title')->text());
        $this->assertEquals("http://127.0.1.1/properties/view/2", $this->byId('rlink-2')->attribute("href"));
    }

    public function testClickSellRedirectAndDisplayMessageIfNotResultsFound()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchPostcode")->value("xx5");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }

    public function testQuickSearchPassPostcodeReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchPostcode")->value("bs1");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("http://127.0.1.1/properties/view/1", $this->byId('rlink-1')->attribute("href"));
    }

    public function testQuickSearchPassPostcodeNotReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchPostcode")->value("xx5");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }

    public function testQuickSearchPassMinBedReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchMinbeds")->value("3");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("http://127.0.1.1/properties/view/3", $this->byId('rlink-3')->attribute("href"));
    }

    public function testQuickSearchPassMinBedNotReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchMinbeds")->value("7");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }

    public function testQuickSearchPassMaxBedReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchMaxbeds")->value("1");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("http://127.0.1.1/properties/view/1", $this->byId('rlink-1')->attribute("href"));
    }

    public function testQuickSearchPassTypeReturnsProperties()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("SearchType")->value("flat");
        $this->byId("quick-sell")->click();

        $this->assertEquals("For sell:", $this->byId('search-title')->text());
        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }
}