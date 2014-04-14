<?php
App::uses('RequestdetailsController', 'Controller');

/**
 * RequestdetailsController Test Case
 *
 */
class RequestdetailsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.requestdetails',
		'app.request'
	);

    public function testAddWithGetRequestRedirectToViewView() {
        $this->generate('Requestdetails', array(
            'components' => array(
                'Auth')));

        $data = array(
            'Requestdetail' => array(
                'id' => 1
            )
        );

        $this->testAction('/requestdetails/add', array('method'=>'get', 'data' => $data));
        $this->assertContains('http://127.0.1.1/admin/request/view', $this->headers['Location']);
    }

	public function testAddFailToSaveRedirectToViewAndDisplayMessage() {
        $RD = $this->generate('Requestdetails', array(
            'models' => array(
                'Requestdetail' => array("save")),
            'components' => array(
                'Session' => array("setFlash"),
                'Auth')));

        $RD->Requestdetail
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $RD->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("The requestdetail could not be saved. Please, try again.");

        $data = array(
            'Requestdetail' => array(
                'id' => 1
            )
        );

        $this->testAction('/requestdetails/add', array('method'=>'post', 'data' => $data));
        $this->assertContains('http://127.0.1.1/admin/request/view', $this->headers['Location']);
	}

    public function testAdd() {
        $RD = $this->generate('Requestdetails', array(
            'models' => array(
                'Requestdetail' => array("save")),
            'components' => array(
                'Auth')));

        $RD->Requestdetail
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $data = array(
            'Requestdetail' => array(
                'requests_id' => 1
            )
        );

        $this->testAction('/requestdetails/add', array('method'=>'post', 'data' => $data));
        $this->assertContains('http://127.0.1.1/requests/view/1', $this->headers['Location']);
    }

}
