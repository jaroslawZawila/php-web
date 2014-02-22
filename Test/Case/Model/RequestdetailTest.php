<?php
App::uses('Requestdetail', 'Model');

/**
 * Requestdetail Test Case
 *
 */
class RequestdetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.requestdetail',
		'app.requests'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Requestdetail = ClassRegistry::init('Requestdetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requestdetail);

		parent::tearDown();
	}

}
