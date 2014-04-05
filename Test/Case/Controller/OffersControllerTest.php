<?php
App::uses('OffersController', 'Controller');

/**
 * OffersController Test Case
 *
 */
class OffersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.offer',
		'app.property',
		'app.customer'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAddNoPostRequestDisplaysPropertiesAndCustomer() {
        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array('find'),
                'Customer' => array('find')
            )
        ));

        $Offers->Property
            ->expects($this->once())
            ->method('find');

        $Offers->Customer
            ->expects($this->once())
            ->method('find');


        $this->testAction(
            '/offers/add',
            array('method' => 'get')
        );
	}

    public function testAddPostRequestFailToSaveOfferDisplaysMessage() {
        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Offer' => array('save')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Offers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('There was some problem. Please try again.');

        $data = array(
            'Viewing' => array(
                'customers_id' => 1,
                'comment' => 'comment',
                'properties_id' => 1,
                'date' => ''
            )
        );
        $this->testAction(
            '/offers/add',
            array('data' => $data, 'method' => 'post')
        );

    }

    public function testAddPostRequestSaveMessageAndRedirectToindex() {
        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Offer' => array('save')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Offers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The offer has been saved.');

        $data = array(
            'Viewing' => array(
                'customers_id' => 1,
                'comment' => 'comment',
                'properties_id' => 1
            )
        );
        $this->testAction(
            '/offers/add',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/offers', $this->headers['Location']);

    }
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
