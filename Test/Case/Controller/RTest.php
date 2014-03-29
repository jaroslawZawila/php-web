<?php
/**
 * Created by PhpStorm.
 * User: jaroslaw
 * Date: 21/03/14
 * Time: 20:39
 */

class Test extends ControllerTestCase //PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.1.1/');
    }

    public function testTitle()
    {
        $this->url('http://127.0.1.1/');
        $this->byId("contact")->click();
        $this->assertEquals('Love Estate Agent: Home', $this->title());
    }

}
?>