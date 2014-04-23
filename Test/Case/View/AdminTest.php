<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 21/04/14
 * Time: 18:53
 */

App::uses('TestHelper', 'Test');

class RunSuite extends PHPUnit_Framework_TestSuite
{
    private $conn;

    public static function suite()
    {
        return new RunSuite('AdminTest');
    }

    protected function setUp()
    {
        $this->conn = new TestHelper();

        $this->conn->init();
    }

    protected function tearDown()
    {
        $this->conn->dropSchema();
    }
}

class AdminTest extends PHPUnit_Extensions_Selenium2TestCase {

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');

    }

    public function testAddNewMemberOfStaffAndLogIn() {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();
        $this->byId("staffs")->click();
        $this->byId("add-button")->click();

        $this->byId("fname")->value("username");
        $this->byId("sname")->value("usersurname");
        $this->byId("address")->value("address");
        $this->byId("fname")->value("user");
        $this->byId("phone")->value("07871068902");
        $this->byId("nin")->value("sh03605b");
        $this->byId("salary")->value("32000");
        $this->byId("bonus")->value("5%");
        $this->byId("sdate")->value("04/04/2013");
        $this->byId("username")->value("user");
        $this->byId("register")->click();

        $this->byId("view-button-0")->click();
        $this->byId("permisions-tab")->click();
        $this->byId("password")->clear();
        $this->byId("password")->value("user");
        $this->byId("update")->click();

        $this->byId("logout")->click();

        $this->byId("login")->click();
        $this->byId("username")->value('user');
        $this->byId("password")->value('user');
        $this->byId("login-button")->click();

        $this->assertNotNull($this->byId("staffs"));
    }

    public function testPersonalDetailsAreUpdated() {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();
        $this->byId("staffs")->click();

        $this->byId("view-button-0")->click();

        $this->assertEquals("address", $this->byId("address")->text());
        $this->assertEquals("07871068902", $this->byId("phone")->text());
        $this->assertEquals("sh03605b", $this->byId("nin")->text());

        $this->byId("edit-Staff")->click();
        sleep(1);
        $this->byId("e-address")->clear();
        $this->byId("e-address")->value("new address");
        $this->byId("e-phone")->clear();
        $this->byId("e-phone")->value("07871068903");
        $this->byId("e-nin")->clear();
        $this->byId("e-nin")->value("sh03605c");
        $this->byId("epu")->click();

        $this->assertEquals("new address", $this->byId("address")->text());
        $this->assertEquals("07871068903", $this->byId("phone")->text());
        $this->assertEquals("sh03605c", $this->byId("nin")->text());
    }

    public function testCompensationDetailsAreUpdated() {
        $this->url('http://127.0.1.1/');

        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();
        $this->byId("staffs")->click();

        $this->byId("view-button-0")->click();
        $this->byId("compensation-tab")->click();

        $this->assertEquals("£32000", $this->byId("salary")->text());
        $this->assertEquals("5%", $this->byId("bonus")->text());

        $this->byId("edit-comp")->click();
        sleep(1);
        $this->byId("e-compensation")->clear();
        $this->byId("e-compensation")->value("32001");
        $this->byId("e-bonus")->clear();
        $this->byId("e-bonus")->value("10");
        $this->byId("epuc")->click();

        $this->byId("compensation-tab")->click();
        $this->assertEquals("£32001", $this->byId("salary")->text());
        $this->assertEquals("10%", $this->byId("bonus")->text());

    }
} 