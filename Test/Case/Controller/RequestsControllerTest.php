<?php
App::uses('RequestsController', 'Controller');

/**
 * RequestsController Test Case
 *
 */
class RequestsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.request',
        'app.requestPlus'
        );
    public $autoFixtures = false;

    function mockAuth($controller) {
        return  $controller->generate('Requests', array(
            'components' => array(
                'Auth'
            )
        ));
    }
/**
 * testIndex method
 *
 * @return void
 */
	public function testIndexSortLinksArePresented() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index', array( 'return' => 'view'));

        $this->assertPattern('/<a href="\/requests\/index\/sort:id\/direction:asc">Id<\/a>/', $results);
        $this->assertPattern('/<a href="\/requests\/index\/sort:name\/direction:asc">Name<\/a>/', $results);
        $this->assertPattern('/<a href="\/requests\/index\/sort:type\/direction:asc">Type<\/a>/', $results);
        $this->assertPattern('/<a href="\/requests\/index\/sort:status\/direction:asc">Status<\/a>/', $results);
        $this->assertPattern('/<a href="\/requests\/index\/sort:date\/direction:asc" class="desc">Date<\/a>/', $results);
	}

    public function testIndexSortWithDefaultSettingReturnsNewestRequestsFirst() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index', array( 'return' => 'vars'));

        $this->assertEquals('2014-03-08 17:31:20', $results['requests'][0]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:17', $results['requests'][1]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:15', $results['requests'][2]['Requests']['date']);
    }

    public function testIndexSortWithDataDescWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:date/direction:desc', array( 'return' => 'vars'));

        $this->assertEquals('2014-03-08 17:31:20', $results['requests'][0]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:17', $results['requests'][1]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:15', $results['requests'][2]['Requests']['date']);
    }

    public function testIndexSortWithDataAscWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:date/direction:asc', array( 'return' => 'vars'));

        $this->assertEquals('2014-03-08 17:31:15', $results['requests'][0]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:17', $results['requests'][1]['Requests']['date']);
        $this->assertEquals('2014-03-08 17:31:20', $results['requests'][2]['Requests']['date']);
    }

    public function testIndexSortWithTypeDescWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:type/direction:desc', array( 'return' => 'vars'));

        $this->assertEquals('Seller', $results['requests'][0]['Requests']['type']);
        $this->assertEquals('Landlord', $results['requests'][1]['Requests']['type']);
        $this->assertEquals('Buyer', $results['requests'][2]['Requests']['type']);
    }

    public function testIndexSortWithTypeAscWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:type/direction:asc', array( 'return' => 'vars'));

        $this->assertEquals('Buyer', $results['requests'][0]['Requests']['type']);
        $this->assertEquals('Landlord', $results['requests'][1]['Requests']['type']);
        $this->assertEquals('Seller', $results['requests'][2]['Requests']['type']);
    }

    public function testIndexSortWithNameAscWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:name/direction:asc', array( 'return' => 'vars'));

        $this->assertEquals('test name1', $results['requests'][0]['Requests']['name']);
        $this->assertEquals('test name2', $results['requests'][1]['Requests']['name']);
        $this->assertEquals('test name3', $results['requests'][2]['Requests']['name']);
    }

    public function testIndexSortWithNameDescWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:name/direction:desc', array( 'return' => 'vars'));

        $this->assertEquals('test name3', $results['requests'][0]['Requests']['name']);
        $this->assertEquals('test name2', $results['requests'][1]['Requests']['name']);
        $this->assertEquals('test name1', $results['requests'][2]['Requests']['name']);
    }

    public function testIndexSortWithIdAscWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:id/direction:asc', array( 'return' => 'vars'));

        $this->assertEquals('1', $results['requests'][0]['Requests']['id']);
        $this->assertEquals('2', $results['requests'][1]['Requests']['id']);
        $this->assertEquals('3', $results['requests'][2]['Requests']['id']);
    }

    public function testIndexSortWithIdDescWorks() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index/sort:id/direction:desc', array( 'return' => 'vars'));

        $this->assertEquals('3', $results['requests'][0]['Requests']['id']);
        $this->assertEquals('2', $results['requests'][1]['Requests']['id']);
        $this->assertEquals('1', $results['requests'][2]['Requests']['id']);
    }

    public function testIndexPaginationIsNotDisplayedIfNumberOfItemsLessThan10() {
        $this->mockAuth($this);
        $this->loadFixtures('Request');

        $results = $this->testAction('requests/index', array( 'return' => 'view'));

        $this->assertNoPattern('/<div class="paging">/', $results);
    }

    public function testIndexPaginationIsDisplayedCorrectlyIfNumberOfItemsBiggerThan10() {
        $this->mockAuth($this);
        $this->loadFixtures('RequestPlus');

        $results = $this->testAction('requests/index', array( 'return' => 'view'));

        $this->assertPattern('/<div class="paging">/', $results);
    }

    public function testIndexPaginationPrevButtonDisabledOnFirstPage() {
        $this->mockAuth($this);
        $this->loadFixtures('RequestPlus');

        $results = $this->testAction('requests/index', array( 'return' => 'view'));

        $this->assertPattern('/<span class="prev disabled btn btn-default">/', $results);
    }

    public function testIndexPaginationNextButtonDisabledOnLastPage() {
        $this->mockAuth($this);
        $this->loadFixtures('RequestPlus');

        $results = $this->testAction('requests/index/page:2', array( 'return' => 'view'));

        $this->assertPattern('/<span class="next disabled btn btn-default">/', $results);
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
	public function testAdd() {
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
