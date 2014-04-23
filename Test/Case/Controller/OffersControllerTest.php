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
	public function testIndexReturnsOneOffer() {
        $result = $this->testAction('/offers', array('return'=>'vars'));
        $this->assertEqual(1, count($result));
	}

/**
 * testView method
 *
 * @return void
 */
	public function testViewThrowExcetionIfOfferDoesNotExsit() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Offer' => array('exists')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(false));


        $this->expectException('NotFoundException','Offer cannot be found.');
        $this->testAction(
            '/offers/view/1000',
            array('method' => 'get')
        );
	}

    public function testViewSetUpDetailsCorrectly() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Auth'
            ),
            'methods' => array('set'
            )
        ));

        $Offers->expects($this->at(0))
            ->method('set')
            ->with('offer');

        $Offers->expects($this->at(1))
            ->method('set')
            ->with('comment', 'Comment');

        $this->testAction(
            '/offers/view/1',
            array('method' => 'get')
        );
    }

    public function testUpdateThrowExcetionIfOfferDoesNotExsit() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Offer' => array('exists')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(false));


        $this->expectException('NotFoundException','Offer cannot be found.');
        $this->testAction(
            '/offers/update/1000',
            array('method' => 'get')
        );
    }

    public function testUpdateRedirectToViewAndDisplayErrorMessageIfCannotUpdateOffer() {

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
            ->with("There was some problem. Please try again.");

        $this->testAction(
            '/offers/update/status/1',
            array('method' => 'get')
        );

        $this->assertContains('http://127.0.1.1/offers/view/1', $this->headers['Location']);
    }

    public function testUpdateRedirectToViewAndDisplaySuccessfulMessage() {

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
            ->with("The offer has been updated.");

        $this->testAction(
            '/offers/update/status/1',
            array('method' => 'get')
        );

        $this->assertContains('http://127.0.1.1/offers/view/1', $this->headers['Location']);
    }

    public function testEditCommentWithMethodDifferentThanPostRedirectToIndexView() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Auth'
            )
        ));

        $this->testAction(
            '/offers/editComment/1',
            array('method' => 'get')
        );

        $this->assertContains('http://127.0.1.1/offers', $this->headers['Location']);
    }

    public function testEditCommentRedirectToOffersIfOfferCannotBefound() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Offer' => array('exists')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(false));
        $Offers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("Cannot find offer.");

        $data = array(
            'Offers' => array(
                'id' => 1,
                'comment' => 'comment'
            )
        );

        $this->testAction(
            '/offers/editComment/1',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/offers', $this->headers['Location']);
    }



    public function testEditCommentDisplayErrorMessageIfTheCommentCannotBeUpdated() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Offer' => array('exists', 'save')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));
        $Offers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("There was some problem. Please try again.");
        $Offers->Offer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $data = array(
            'Offers' => array(
                'id' => 1,
                'comment' => 'comment'
            )
        );

        $this->testAction(
            '/offers/editComment/1',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/offers', $this->headers['Location']);
    }

    public function testEditCommentDisplayErrorMessageIfTheCommentUpdated() {

        $Offers = $this->generate('Offers', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'
            ),
            'models' => array(
                'Offer' => array('exists', 'save')
            )
        ));

        $Offers->Offer
            ->expects($this->once())
            ->method('exists')
            ->will($this->returnValue(true));
        $Offers->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("The comment has been updated.");
        $Offers->Offer
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $data = array(
            'Offers' => array(
                'id' => 1,
                'comment' => 'comment'
            )
        );

        $this->testAction(
            '/offers/editComment/1',
            array('data' => $data, 'method' => 'post')
        );

        $this->assertContains('http://127.0.1.1/offers', $this->headers['Location']);
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

    public function testAddPostRequestSaveMessageAndRedirectToIndex() {
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
            ),
            'Offer' => array(
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

}
