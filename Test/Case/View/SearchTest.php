<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 21/04/14
 * Time: 18:27
 */

App::uses('TestHelper', 'Test');

class SearchSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new SearchSuite('SearchTest');
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

class SearchTest extends PHPUnit_Extensions_Selenium2TestCase {

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');

    }

    public function testIfPropertyWithPostCodeDoesNotExsitDisplayCorrectMessageForSale()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("forsale")->click();
        $this->byId("SearchPostcode")->value("xx5");
        $this->byId("search-button")->click();

        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }

    public function testReturnPropertiesOnlyWithinPostcodeProvidedForSale()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("forsale")->click();
        $this->byId("SearchPostcode")->value("bs1");
        $this->byId("search-button")->click();

        $this->assertEquals("http://127.0.1.1/properties/view/1", $this->byId('rlink-1')->attribute("href"));
    }

    public function testIfPropertyWithPostCodeDoesNotExsitDisplayCorrectMessageToLet()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("tolet")->click();
        $this->byId("SearchPostcode")->value("xx5");
        $this->byId("search-button")->click();

        $this->assertEquals("Sorry we cannot find any properties to match your crieteria. May be broaden you search ??? ...", $this->byId('search-msg')->text());
    }

    public function testReturnPropertiesOnlyWithinPostcodeProvidedToLet()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("tolet")->click();
        $this->byId("SearchPostcode")->value("bs5");
        $this->byId("search-button")->click();

        $this->assertEquals("http://127.0.1.1/properties/view/2", $this->byId('rlink-2')->attribute("href"));
    }
} 