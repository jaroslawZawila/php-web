<?php
App::uses('CustomersController', 'Controller');

/**
 * CustomersController Test Case
 *
 */
class CustomersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customer',
        'app.property',
        'app.doc',
        'app.viewing'
	);

/**
 * testIndex method
 *
 * @return void
 */
    public function testIndexReturns10ItemsPerPage() {
        $result = $this->testAction('/customers/index/', array( 'return' => 'vars'));

        debug($result);

        $this->assertEquals(10, count($result['customers']));
    }

    public function testIndexReturns1ItemsPerPageOnSecondPage() {
        $result = $this->testAction('/customers/index/page:2', array( 'return' => 'vars'));

        $this->assertEquals(2, count($result['customers']));
    }

    public function testIndexRedirectToFirstPageIfIndexOutOfRange() {
        $this->testAction('/customers/index/page:20000', array( 'return' => 'vars'));

        $this->assertContains('http://127.0.1.1/admin/customer/view', $this->headers['Location']);
    }

/**
 * testView method
 *
 * @return void
 */
	public function testViewCustomerWhichCouldNotBeFoundThrowsException() {
        $this->expectException('NotFoundException','Cannot find customer.');
        $this->testAction('/customers/view/3000');
	}

    public function testViewPropertiesTabNotVisibleForBuyer() {

        $Customers = $this->generate('Customers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'methods' => array('set')

        ));

        $Customers->expects($this->at(6))
                  ->method('set')
                  ->with('visible', 'hide');

        $this->testAction('/customers/view/1');
    }

    public function testViewPropertiesTabNotVisibleForTenant() {

        $Customers = $this->generate('Customers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'methods' => array('set')

        ));

        $Customers->expects($this->at(6))
            ->method('set')
            ->with('visible', 'hide');

        $this->testAction('/customers/view/2');
    }

    public function testViewPropertiesTabVisibleForEverybodyExceptTenantAndBuyer() {

        $Customers = $this->generate('Customers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'methods' => array('set')

        ));

        $Customers->expects($this->at(6))
            ->method('set')
            ->with('visible', '');

        $this->testAction('/customers/view/3');
    }
/**
 * testAdd method
 *
 * @return void
 */
	public function testAddCustomerDisplaySuccessfulMessageAndRedirectToViewPage() {
        $Customers = $this->generate('Customers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Customer' => array('save')
            )
        ));

        $Customers->Customer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Customers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The customer has been saved.');

        $data = array(
            'Customer' => array(
                'id' => 2
            )
        );
        $this->testAction(
            '/customers/add',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/customers/view', $this->headers['Location']);
	}

    public function testAddCustomerDisplayFaildMessage() {
        $Customers = $this->generate('Customers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Customer' => array('save')
            )
        ));

        $Customers->Customer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Customers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The customer could not be saved. Please, try again.');

        $data = array(
            'Customer' => array(
                'id' => 2
            )
        );
        $this->testAction(
            '/customers/add',
            array('data' => $data, 'method' => 'post')
        );
    }

/**
 * testEdit method
 *
 * @return void
 */
//	public function testAttemptToEditCustomerWhichCannotBeFoundThrowException() {
//        $this->expectException('NotFoundException','Customer cannot be found.');
//        $this->testAction('/customers/edit/3000');
//	}



}
