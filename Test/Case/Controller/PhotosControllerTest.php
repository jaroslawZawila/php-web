<?php
App::uses('PhotosController', 'Controller');

/**
 * PhotosController Test Case
 *
 */
class PhotosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.photo',
		'app.property'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testCreateDisplayErrorMessageIfExtensionUnsupported() {

        $Photos = $this->generate('Photos', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth')));

        $Photos->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The photo could not be saved. Please, try again.');

        $data = array(
            'Photo'=>array(
                "photo" => array(
                    'name' => 'name.xxx'
                ),
                "propertyid" => 1
            )
        );

        $this->testAction('/photos/create', array('data' => $data, 'method' => 'post','result'=>'vars'));
	}

    public function testCreateDisplayFailureMessageIfPhotoCannotBeSaved() {

        $Photos = $this->generate('Photos', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'),
            'models' => array(
                'Photo' => array('save')
            )));

        $Photos->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The photo could not be saved. Please, try again.');

        $Photos->Photo
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(false));

        $data = array(
            'Photo'=>array(
                "photo" => array(
                    'name' => 'name.jpg',
                    'tmp_name' => 'tmp'
                ),
                "propertyid" => 1,
                "description" => "description"
            )
        );

        $this->testAction('/photos/create', array('data' => $data, 'method' => 'post','result'=>'vars'));
    }

    public function testCreateSavePhotoSuccessfully() {

        $Photos = $this->generate('Photos', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'),
            'models' => array(
                'Photo' => array('save')
            )));

        $Photos->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The photo has been saved.');

        $Photos->Photo
            ->expects($this->once())
            ->method('save')
            ->will($this->returnValue(true));

        $data = array(
            'Photo'=>array(
                "photo" => array(
                    'name' => 'name.jpg',
                    'tmp_name' => 'tmp'
                ),
                "propertyid" => 1,
                "description" => "description"
            )
        );

        $this->testAction('/photos/create', array('data' => $data, 'method' => 'post','result'=>'vars'));
    }


    public function testDeleteThrowExceptionIfPhotoCannotBefound() {
        $this->expectException('NotFoundException','Photo cannot be found.');
        $this->testAction('/photos/delete/300');
    }

    public function testDeleteSuccessfully() {

        $Photos = $this->generate('Photos', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'),
            'models' => array(
                'Photo' => array('delete')
            )));

        $Photos->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The photo has been deleted.');

        $Photos->Photo
            ->expects($this->once())
            ->method('delete')
            ->will($this->returnValue(true));

        $this->testAction('/photos/delete/1');
    }

    public function testDeleteFailedDisplayMessage() {

        $Photos = $this->generate('Photos', array(
            'components' => array(
                'Session' => array('setFlash'),
                'Auth'),
            'models' => array(
                'Photo' => array('delete')
            )));

        $Photos->Session
            ->expects($this->once())
            ->method('setFlash')
            ->with('The photo could not be deleted. Please, try again.');

        $Photos->Photo
            ->expects($this->once())
            ->method('delete')
            ->will($this->returnValue(false));

        $this->testAction('/photos/delete/1');
    }

}
