<?php
App::uses('StaffsController', 'Controller');

/**
 * StaffsController Test Case
 *
 */
class StaffsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.staff',
		'app.user'
	);


    public function testTerminateThrowExceptionIfStaffCannotBeFound() {


        $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array("exists")),
            'components' => array(
                'Auth')));

        $this->expectException('NotFoundException','Cannot find member of staff.');
        $this->testAction('/staffs/terminate/1000');
    }

    public function testTerminateRedirectToViewAndDisplayMessageIfSuccessful() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $Staffs->Staff
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('The staff has been terminated.');


        $this->testAction('/staffs/terminate/1');
        $this->assertContains('http://127.0.1.1/staffs/view/1', $this->headers['Location']);
    }

    public function testTerminate() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $Staffs->Staff
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('Cannot terminate eployment. Please, try again.');


        $this->testAction('/staffs/terminate/1');
    }

    public function testEditThrowExceptionIfStaffCannotBeFound() {


        $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array("exists")),
            'components' => array(
                'Auth')));

        $this->expectException('NotFoundException','Cannot find member of staff.');
        $this->testAction('/staffs/edit/1000');
    }

    public function testEditRedirectToIndexIfNotPostRequest() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $data = array(
            'Staffs' => array(
                'id' => 1
            )
        );

        $this->testAction('/staffs/edit/1', array('method'=>'get', 'data' => $data));
        $this->assertContains('http://127.0.1.1/staffs', $this->headers['Location']);
    }

    public function testEditRedirectToIndexIfAndDisplayMessageIfStaffCannotBeUpdated() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('The staff could not be edited. Please, try again.');

        $data = array(
            'Staffs' => array(
                'id' => 1
            )
        );

        $this->testAction('/staffs/edit/1', array('method'=>'post', 'data' => $data));
        $this->assertContains('http://127.0.1.1/staffs', $this->headers['Location']);
    }

    public function testEditDisplayMessageIfSuccessfullyUpdated() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $Staffs->Staff
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('The records has been updated.');

        $data = array(
            'Staffs' => array(
                'id' => 1
            )
        );

        $this->testAction('/staffs/edit/1', array('method'=>'post', 'data' => $data));
    }

    public function testViewThrowExceptionIfStaffCannotBefound() {
        $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array("exists")),
            'components' => array(
                'Auth')));

        $this->expectException('NotFoundException','Cannot find member of staff.');
        $this->testAction('/staffs/view/1000');
    }

    public function testViewLoadedSuccessfully() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save'),
                'Group' => array('find')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Staff
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));

        $this->testAction('/staffs/view/1', array('method'=>'post'));
    }

    public function testIndexLoadedSuccessfully() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save'),
                'Group' => array('find')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));


        $this->testAction('/staffs/');
    }

    public function testAddDisplayMessageIfFailed() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save'),
                'Group' => array('find')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('The staff could not be saved. Please, try again.');

        $data = array('Staff' => array(

        ));

        $this->testAction('/staffs/add', array('method' => 'post', 'data'=> $data));
    }

    public function testAdd() {

        $Staffs = $this->generate('Staffs', array(
            'models' => array(
                'Staff' => array('exists', 'save'),
                'Group' => array('find'),
                'User' => array('save')),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Staffs->Session->expects($this->once())
            ->method('setFlash')
            ->with('The staff has been saved.');

        $Staffs->Staff->expects($this->any())
            ->method('save')
            ->will($this->returnValue(true));

        $Staffs->User->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $data = array('Staff' => array(
            'username' => "a"
        ),
        'User'=> array('password' => ''));

        $this->testAction('/staffs/add', array('method' => 'post', 'data'=> $data));
    }
}
