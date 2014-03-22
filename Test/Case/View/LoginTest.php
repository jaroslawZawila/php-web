<?php
/**
 * Created by PhpStorm.
 * User: jaroslaw
 * Date: 21/03/14
 * Time: 20:39
 */

class LoginTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');
    }

    public function testLogInSuccess()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->assertEquals('Love Estate Agent: Home', $this->title());
    }

    public function testAfterLogInLogOutButtonIsDisplayed()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('admin');
        $this->byId("login-button")->click();

        $this->assertEquals(true, $this->byId('logout')->displayed());
    }

    public function testIfLoginFailedMessageIsDisplayed()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("login")->click();
        $this->byId("username")->value('admin');
        $this->byId("password")->value('wrong');
        $this->byId("login-button")->click();

        $element = $this->byId('flashMessage');

        $this->assertEquals('Your username or password was incorrect.', $element->text());
        $this->assertEquals('alert alert-danger', $element->attribute("class"));
    }

    public function testAccessPageWithOutPermissionRedirectToLoginPage()
    {
        $this->url('http://127.0.1.1/admin/request/view');
        $this->assertEquals('Love Estate Agent: Users', $this->title());
    }
}
?>