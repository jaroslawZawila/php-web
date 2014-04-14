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
        return new RequestFormSuite('RequestFormTest');
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

    public function testRequestIsClosed()
    {
        $this->conn->initData("request.sql");
        sleep(1);

        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("request-link-menu")->click();
        $this->byId("view-button-0")->click();

        $this->assertEquals("NEW", $this->byId('status')->value());
        $this->select($this->byId("status"))->selectOptionByValue('CLOSED');

        $this->byId("apply")->click();

        $this->assertEquals('Status changed to CLOSED ', $this->byId('comment-1')->text());

        $this->setExpectedException('PHPUnit_Extensions_Selenium2TestCase_WebDriverException');
        $this->byId("apply");
    }

    public function testRequestIsInvalid()
    {
        $this->conn->initData("request.sql");
        sleep(1);

        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("request-link-menu")->click();
        $this->byId("view-button-0")->click();

        $this->assertEquals("NEW", $this->byId('status')->value());
        $this->select($this->byId("status"))->selectOptionByValue('INVALID');

        $this->byId("apply")->click();

        $this->assertEquals('Status changed to INVALID ', $this->byId('comment-1')->text());

        $this->setExpectedException('PHPUnit_Extensions_Selenium2TestCase_WebDriverException');
        $this->byId("apply");
    }

    public function testRequestAddedComment()
    {
        $this->conn->initData("request.sql");
        sleep(1);

        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->byId("request-link-menu")->click();
        $this->byId("view-button-0")->click();

        $this->byId("add-comment")->click();
        sleep(1);
        $this->byId("RequestdetailComment")->value("comment");
        $this->byId("submit-comment")->click();
        $this->assertEquals('comment ', $this->byId('comment-1')->text());
    }
}