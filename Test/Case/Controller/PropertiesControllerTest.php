<?php
App::uses('PropertiesController', 'Controller');

/**
 * PropertiesController Test Case
 *
 */
class PropertiesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customer',
		'app.property',
        'app.photo'
	);

    public $autoFixtures = true;

    function mockAuth($controller) {
        return  $controller->generate('Properties', array(
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
    public function testPropertiesSortLinksArePresentedInList() {
        $this->mockAuth($this);

        $results = $this->testAction('properties/lists', array( 'return' => 'view'));

        $this->assertPattern('/<a href="\/properties\/lists\/sort:id\/direction:asc">Id<\/a>/', $results);
        $this->assertPattern('/<a href="\/properties\/lists\/sort:houseno\/direction:asc">Houseno<\/a>/', $results);
        $this->assertPattern('/<a href="\/properties\/lists\/sort:street\/direction:asc">Street<\/a>/', $results);
        $this->assertPattern('/<a href="\/properties\/lists\/sort:city\/direction:asc">City<\/a>/', $results);
        $this->assertPattern('/<a href="\/properties\/lists\/sort:postcode\/direction:asc">Postcode<\/a>/', $results);
    }

    public function testListReturns10ItemsPerPage() {
        $result = $this->testAction('/admin/properties/view', array( 'return' => 'vars'));


        $this->assertEquals(10, count($result['properties']));
    }

    public function testIndexReturns1ItemsPerPageOnSecondPage() {
        $result = $this->testAction('/properties/lists/page:2', array( 'return' => 'vars'));

        $this->assertEquals(1, count($result['properties']));
    }

    public function testIndexRedirectToFirstPageIfIndexOutOfRange() {
        $this->testAction('/properties/lists/page:20000', array( 'return' => 'vars'));

        $this->assertContains('http://127.0.1.1/admin/properties/view', $this->headers['Location']);
    }

    public function testIndexTitelIsProperIfForSalePageLoaded() {
        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual("For sell:", $results['resultstitle']);
    }

    public function testIndexTitelIsProperIfToLetPageLoaded() {
        $results = $this->testAction('/tolet', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual("To let:", $results['resultstitle']);
    }

    public function testIndexPricesAreLoadedCorrectlyForSale() {
        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual("£ 100,000", $results['minmax'][100000]);
        $this->assertEqual("£ 110,000", $results['minmax'][110000]);
        $this->assertEqual("£ 120,000", $results['minmax'][120000]);
        $this->assertEqual("£ 130,000", $results['minmax'][130000]);
        $this->assertEqual("£ 140,000", $results['minmax'][140000]);
    }

    public function testIndexPricesAreLoadedCorrectlyForLet() {
        $results = $this->testAction('/tolet', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual("£100 PCM", $results['minmax'][100]);
        $this->assertEqual("£200 PCM", $results['minmax'][200]);
        $this->assertEqual("£300 PCM", $results['minmax'][300]);
        $this->assertEqual("£400 PCM", $results['minmax'][400]);
        $this->assertEqual("£500 PCM", $results['minmax'][500]);
        $this->assertEqual("£600 PCM", $results['minmax'][600]);
        $this->assertEqual("£700 PCM", $results['minmax'][700]);
        $this->assertEqual("£800 PCM", $results['minmax'][800]);
        $this->assertEqual("£900 PCM", $results['minmax'][900]);
        $this->assertEqual("£1000 PCM", $results['minmax'][1000]);
        $this->assertEqual("£1250 PCM", $results['minmax'][1250]);
        $this->assertEqual("£1500 PCM", $results['minmax'][1500]);
        $this->assertEqual("£1750 PCM", $results['minmax'][1750]);
        $this->assertEqual("£2000 PCM", $results['minmax'][2000]);
    }


    public function testIndexFeaturedPropertiesAreSetUpCorrectly() {
        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual(1, count($results['featureds']));
        $this->assertEqual(11, $results['featureds'][0]['Property']['id'] );
    }

    public function testIndexReturnsOnlyVisibleProperties() {
        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get'));

        $this->assertEqual(10, count($results['properties']));
    }

    public function testIndexReturnsOnlyPropertiesWithPostcodeLike() {
        $data = array(
            'postcode' => 'PS'
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(1, count($results['properties']));
        $this->assertEqual("PS5 7TP", $results['properties'][0]['Property']['postcode']);
    }

    public function testIndexReturnsOnlyPropertiesWithMinBedHigherOrEqualThan5() {
        $data = array(
            'minbeds' => 5
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(1, count($results['properties']));
        $this->assertEqual(4, $results['properties'][0]['Property']['id']);
    }

    public function testIndexReturnsOnlyPropertiesWithMaxBedLowerOrEqualThan1() {
        $data = array(
            'maxbeds' => 1
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(9, count($results['properties']));
    }

    public function testIndexReturnsOnlyPropertiesWithMinPriceHigherOrEqualThan5() {
        $data = array(
            'mina' => 5
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(1, count($results['properties']));
        $this->assertEqual(5, $results['properties'][0]['Property']['id']);
    }

    public function testIndexReturnsOnlyPropertiesWithMaxPriceLowerOrEqualThan1() {
        $data = array(
            'max' => 1
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(9, count($results['properties']));
    }

    public function testIndexReturnsOnlyPropertiesWithProperType() {
        $data = array(
            'type' => 'flat'
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(1, count($results['properties']));
        $this->assertEqual(6, $results['properties'][0]['Property']['id']);
    }

    public function testIndexReturnsOnlyPropertiesWithInvalidTypeReturnEmptyList() {
        $data = array(
            'type' => 'xxx'
        );

        $results = $this->testAction('/forsale', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(0, count($results['properties']));
    }

    public function testIndexLinkFromQuickSerchToLetWork() {
        $data = array(
            'action' => 'Let'
        );

        $results = $this->testAction('/properties', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(0, count($results['properties']));
    }

    public function testIndexLinkFromQuickSerchToSellWork() {
        $data = array(
            'action' => 'Sale'
        );

        $results = $this->testAction('/properties', array('return' => 'vars', 'method'=>'get', 'data'=> $data));

        $this->assertEqual(10, count($results['properties']));
    }
    /**
 * testView method
 *
 * @return void
 */
	public function testViewPropertyNotFoundThrowsException() {
        $this->expectException('NotFoundException','Property cannot be found.');
        $this->testAction('/properties/view/1000');
	}

    public function testViewRetrivePhotosAndPropertyDetailsIfExsits() {

        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Photo' => array("gets"),
                'Property' => array("view_properties"))));

        $Properties->Property->expects($this->once())
                             ->method('view_properties')
                             ->with("1");

        $Properties->Photo->expects($this->once())
            ->method('gets')
            ->with("1");

        $this->testAction('/properties/view/1', array('result'=>'vars'));

    }

/**
 * testAdd method
 *
 * @return void
 */

    public function testAddPropertyUsingGetMethodDisplayMessage() {
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Session' => array("setFlash"),
                'Auth')));

        $Properties->Session->expects($this->once())
            ->method('setFlash')
            ->with("Cannot add property.");

        $this->testAction('/properties/add/1', array('method'=>'get'));
    }

	public function testAddSetMessageIfPropertyCannotBeSave() {
        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array("setFlash"),
                'Auth')));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Properties->Session->expects($this->once())
            ->method('setFlash')
            ->with("The property could not be saved. Please, try again.");

        $data = array(
            'Property'=> array(
                'addtype' => 'sale',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/add/1', array('method'=>'post', 'data'=>$data));
        }

    public function testAddSavePropertyForSale() {
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array("save", "getLastInsertId"))));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Properties->Property->expects($this->once())
            ->method('getLastInsertId')
            ->will($this->returnValue(1));

        $data = array(
            'Property'=> array(
                'addtype' => 'sale',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/add/1', array('method'=>'post', 'data'=>$data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testAddSavePropertyToLet() {
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array("save", "getLastInsertId"))));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Properties->Property->expects($this->once())
            ->method('getLastInsertId')
            ->will($this->returnValue(1));

        $data = array(
            'Property'=> array(
                'addtype' => 'let',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/add/1', array('method'=>'post', 'data'=>$data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

/**
 * testEdit method
 *
 * @return void
 */
	public function testEditPropertyWhichDoesNotExsitstThrowException() {
        $this->expectException('NotFoundException','Property not found.');
        $this->testAction('/properties/edit/3000');
	}

    public function testEditPropertyForSale() {
        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Properties->Session->expects($this->once())
            ->method('setFlash')
            ->with('The property has been saved.');

        $data = array(
            'Property'=> array(
                'addtype' => 'sale',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/edit/1', array('method'=>'post', 'data'=>$data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testEditPropertyTolet() {
        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Properties->Session->expects($this->once())
            ->method('setFlash')
            ->with('The property has been saved.');

        $data = array(
            'Property'=> array(
                'addtype' => 'let',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/edit/1', array('method'=>'post', 'data'=>$data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testEditFailed() {
        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Properties->Property->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Properties->Session->expects($this->once())
            ->method('setFlash')
            ->with('The property could not be saved. Please, try again.');

        $data = array(
            'Property'=> array(
                'addtype' => 'let',
                'postcode' => "bs57yp"
            )
        );

        $this->testAction('/properties/edit/1', array('method'=>'post', 'data'=>$data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testEditWithGetMethodDisplaysDetails() {
        $this->testAction('/properties/edit/1', array('method'=>'get'));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testManageThrowExceptionIfPropertyDoesNotExsits() {
        $this->expectException('NotFoundException','Property not found.');
        $this->testAction('/properties/manage/1123', array('method'=>'get'));
    }

    public function testManageDisplaysPropertyWithLinkToView(){
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array("view_properties"),
                'Photo' => array('gets')),
            'methods' => array('set')));

        $property = array("Property" => array(
            'beds' => 1
        ));

        $Properties->Property
                   ->expects($this->once())
                   ->method('view_properties')
                   ->will($this->returnValue($property));

        $Properties->Photo
                    ->expects($this->once())
                    ->method('gets')
                    ->will($this->returnValue(1));

        $Properties->expects($this->at(0))
            ->method('set')
            ->with('property', $property);

        $Properties->expects($this->at(1))
            ->method('set')
            ->with('photos', 1);

        $Properties->expects($this->at(2))
            ->method('set')
            ->with('docs', array());

        $Properties->expects($this->at(3))
            ->method('set')
            ->with('back', '/admin/properties/view');

        $this->testAction('/properties/manage/1', array('method'=>'get'));
    }

    public function testManageDisplaysPropertyWithLinkToCustomer(){
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array("view_properties"),
                'Photo' => array('gets')),
            'methods' => array('set')));

        $property = array("Property" => array(
            'beds' => 1
        ));

        $Properties->Property
            ->expects($this->once())
            ->method('view_properties')
            ->will($this->returnValue($property));

        $Properties->Photo
            ->expects($this->once())
            ->method('gets')
            ->will($this->returnValue(1));

        $Properties->expects($this->at(0))
            ->method('set')
            ->with('property', $property);

        $Properties->expects($this->at(1))
            ->method('set')
            ->with('photos', 1);

        $Properties->expects($this->at(2))
            ->method('set')
            ->with('docs', array());

        $Properties->expects($this->at(3))
            ->method('set')
            ->with('back', '/customers/view/1');

        $this->testAction('/properties/manage/1/1', array('method'=>'get'));
    }

    public function testManageDisplaysPropertyWith0BedsAsBedsite(){
        $Properties = $this->generate('Properties', array(
            'components' => array(
                'Auth'
            ),
            'models' => array(
                'Property' => array("view_properties"),
                'Photo' => array('gets')),
            'methods' => array('set')));

        $property = array("Property" => array(
            'beds' => 0
        ));

        $newproperty = array("Property" => array(
            'beds' => 'bedside'
        ));

        $Properties->Property
            ->expects($this->once())
            ->method('view_properties')
            ->will($this->returnValue($property));

        $Properties->Photo
            ->expects($this->once())
            ->method('gets')
            ->will($this->returnValue(1));

        $Properties->expects($this->at(0))
            ->method('set')
            ->with('property', $newproperty);

        $Properties->expects($this->at(1))
            ->method('set')
            ->with('photos', 1);

        $Properties->expects($this->at(2))
            ->method('set')
            ->with('docs', array());

        $Properties->expects($this->at(3))
            ->method('set')
            ->with('back', '/customers/view/1');

        $this->testAction('/properties/manage/1/1', array('method'=>'get'));
    }

    public function testUpdateDescriptionSuccessfullyRedirectToManagePage() {

        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array("setFlash"),
                'Auth')));

        $Properties->Property
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $Properties->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("The description has been updated.");

        $data = array(
            'Property' => array(
                'id' => 1
            )
        );

        $this->testAction('/properties/update_description', array('method'=>'post', 'data' => $data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }

    public function testUpdateDescriptionFailedDisplaysMessageAndRedirectToManagePage() {

        $Properties = $this->generate('Properties', array(
            'models' => array(
                'Property' => array("save")),
            'components' => array(
                'Session' => array("setFlash"),
                'Auth')));

        $Properties->Property
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $Properties->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with("The description could not be updated. Please, try again.");

        $data = array(
            'Property' => array(
                'id' => 1
            )
        );

        $this->testAction('/properties/update_description', array('method'=>'post', 'data' => $data));
        $this->assertContains('http://127.0.1.1/properties/manage/1', $this->headers['Location']);
    }
}
