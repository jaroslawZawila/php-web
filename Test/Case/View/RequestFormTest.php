<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 22/03/14
 * Time: 20:54
 */

App::uses('TestHelper', 'Test');

class RequestFormSuite extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        return new MySuite('RequestFormTest');
    }

    protected function setUp()
    {
        print "\nMySuite::setUp()";
    }

    protected function tearDown()
    {
        print "\nMySuite::tearDown()";
    }
}

class RequestFormTest extends PHPUnit_Extensions_Selenium2TestCase
{

    private $conn;

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');
        $this->conn = new TestHelper();
    }

    public function testRequestIsSubmittedSuccessfully()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("contact")->click();

        $this->assertEquals('Love Estate Agent: Requests', $this->title());
        $this->byId("contact-name")->value('test name 1');
        $this->byId("contact-email")->value('test@email.com');
        $this->byId("contact-phone")->value('07871063098');
        $this->byId("contact-type")->value('Seller');
        $this->byId("contact-msg")->value('This is a message');
        $this->byId("contact-submit")->click();

        $this->assertEquals('The request has been send.', $this->byId('flashMessage')->text());
        $this->assertEquals('alert alert-success', $this->byId('flashMessage')->attribute("class"));
    }

}