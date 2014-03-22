<?php
App::uses('Viewing', 'Model');

/**
 * Viewing Test Case
 *
 */
class ViewingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.viewing',
		'app.properties',
		'app.customers'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Viewing = ClassRegistry::init('Viewing');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Viewing);

		parent::tearDown();
	}

}
