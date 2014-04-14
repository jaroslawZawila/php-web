<?php
App::uses('ViewingsController', 'Controller');

/**
 * ViewingsController Test Case
 *
 */
class ViewingsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */

    function mockAuth($controller) {
        return  $controller->generate('Viewings', array(
            'components' => array(
                'Auth'
            )
        ));
    }

	public $fixtures = array(
		'app.viewing',
        'app.property',
        'app.customer'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndexReturns10ItemsPerPage() {
        $result = $this->testAction('/viewings/index/', array( 'return' => 'vars'));

        debug($result);

        $this->assertEquals(10, count($result['viewings']));
	}

    public function testIndexReturns1ItemsPerPageOnSecondPage() {
        $result = $this->testAction('/viewings/index/page:2', array( 'return' => 'vars'));

        $this->assertEquals(1, count($result['viewings']));
    }

    public function testIndexRedirectToFirstPageIfIndexOutOfRange() {
        $this->testAction('/viewings/index/page:20000', array( 'return' => 'vars'));

        $this->assertContains('http://127.0.1.1/admin/viewings/view', $this->headers['Location']);
    }

/**
 * testAdd method
 *
 * @return void
 */
	public function testSuccessfullyAddedViewingSetMessageAndRedirectToTheCustomerView() {
        $Viewings = $this->generate('Viewings', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
             'Viewing' => array('save')
            )
        ));

        $Viewings->Viewing
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Viewings->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The viewing has been saved.');

        $data = array(
            'Viewing' => array(
                'customers_id' => 1,
                'comment' => 'comment',
                'properties_id' => 1,
                'date' => ''
            )
        );
        $this->testAction(
            '/viewings/add',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/customers/view/1', $this->headers['Location']);
	}

    public function testFailingToAddViewingSetMessageAndRedirectToTheCustomerView() {
        $Viewings = $this->generate('Viewings', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Viewing' => array('save')
            )
        ));

        $Viewings->Viewing
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Viewings->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The viewing could not be saved. Please, try again.');

        $data = array(
            'Viewing' => array(
                'customers_id' => 1,
                'comment' => 'comment',
                'properties_id' => 1,
                'date' => ''
            )
        );

        $this->testAction(
            '/viewings/add',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/customers/view/1', $this->headers['Location']);
    }

/**
 * testEdit method
 *
 * @return void
 */
	public function testAttemptToEditNotExcistingItemThrowException() {
        $this->expectException('NotFoundException','Cannot find item.');
        $this->testAction('/viewings/edit/3000');
	}

    public function testEditWithGetRequestDisplayItemForEditing() {
        $this->mockAuth($this);

        $Viewings = $this->generate('Viewings', array(
            'methods' => array('set'),
            'components' => array( 'Auth')));

        $Viewings->expects($this->at(0))
            ->method('set')
            ->with('property_address', '20, Speedwell, City, BS57TR');
        $Viewings->expects($this->at(1))
            ->method('set')
            ->with('customer_name', 'Name Surname');
        $Viewings->expects($this->at(2))
            ->method('set')
            ->with('viewings');

        $this->testAction('/viewings/edit/1', array('method' => 'get','result'=>'contents'));

     }

    public function testEditWithPostRequestWithoutDataDisplaysItemForEditing() {

        $Viewings = $this->generate('Viewings', array(
            'methods' => array('set'),
            'components' => array( 'Auth')));

        $data = array(
            'Viewing' => null
        );

        $Viewings->expects($this->at(0))
            ->method('set')
            ->with('property_address', '20, Speedwell, City, BS57TR');
        $Viewings->expects($this->at(1))
            ->method('set')
            ->with('customer_name', 'Name Surname');
        $Viewings->expects($this->at(2))
            ->method('set')
            ->with('viewings');

        $this->testAction('/viewings/edit/1', array('data' => $data, 'method' => 'post','result'=>'contents'));


    }

    public function testEditWithPutRequestWithoutDataDisplaysItemForEditing() {

        $Viewings = $this->generate('Viewings', array(
            'methods' => array('set'),
            'components' => array( 'Auth')));

        $data = array(
            'Viewing' => null
        );

        $Viewings->expects($this->at(0))
                 ->method('set')
                 ->with('property_address', '20, Speedwell, City, BS57TR');
        $Viewings->expects($this->at(1))
                 ->method('set')
                 ->with('customer_name', 'Name Surname');
        $Viewings->expects($this->at(2))
                 ->method('set')
                 ->with('viewings');

        $this->testAction('/viewings/edit/1', array('data' => $data, 'method' => 'put','result'=>'contents'));

    }

    public function testEditWithPostRequestSetProperMessageIfItemCannotBeEdited() {

        $Viewings = $this->generate('Viewings', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Viewing' => array('save')
            )
        ));

        $Viewings->Viewing
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Viewings->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The viewing could not be edited. Please, try again.');

        $data = array(
            'Viewing' => array(
                'status' => "status",
                'comment' => 'comment',
                'date' => ''
            )
        );

        $this->testAction('/viewings/edit/1', array('data' => $data, 'method' => 'put','result'=>'contents'));
    }

    public function testEditWithPostRequestSetProperMessageIfItemWasEdited() {
        $Viewings = $this->generate('Viewings', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Viewing' => array('save')
            )
        ));

        $Viewings->Viewing
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Viewings->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The viewing has been updated.');

        $data = array(
            'Viewing' => array(
                'status' => "status",
                'comment' => 'comment',
                'date' => ''
            )
        );

        $this->testAction('/viewings/edit/1', array('data' => $data, 'method' => 'put','result'=>'contents'));
    }


}
