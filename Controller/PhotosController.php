<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 */
class PhotosController extends AppController {


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(); // We can remove this line after we're finished
    }
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Photo->create();
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		}
//		$properties = $this->Photo->Property->find('list');
//		$this->set(compact('properties'));
	}

    function create()
    {
        if(!empty($this->data))
        {
            //Check if image has been uploaded
            if(!empty($this->data['Photo']['photo']['name']))
            {
                $data = $this->data;
                $file = $this->data['Photo']['photo']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $filename = 'properties/' .  $this->data['Photo']['propertyid'] . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $filename);

                    //prepare the filename for database entry
                    $this->data['Photo']['url'] = $file['name'];

                    $data['Photo']['description'] = $this->data['Photo']['description'];
                    $data['Photo']['properties_id'] =  $this->data['Photo']['propertyid'];
                    $data['Photo']['url'] = $filename;

                    //now do the save
                    $this->set('p', $this->data);
                    $this->Photo->create();
                    if ($this->Photo->save($data)) {
                        $this->Session->setFlash(__('The photo has been saved.'));
                    } else {
                        $this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
                    }
                }else {
                    $this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
                }
            }
        }
        return $this->redirect(array('controller'=>'properties','action' => 'manage', $this->data['Photo']['propertyid']));
    }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$this->request->data = $this->Photo->find('first', $options);
		}
		$properties = $this->Photo->Property->find('list');
		$this->set(compact('properties'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->onlyAllow('post', 'delete');

        $photo = $this->Photo->find('first', array('conditions' => array('Photo.id' => $id)));
        $file = new File('img/' . $photo['Photo']['url']);

		if ($this->Photo->delete()) {
			$file->delete();
            $this->Session->setFlash(__('The photo has been deleted.'));

		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'));
		}
        return $this->redirect(array('controller'=> 'properties', 'action' => 'manage', $photo['Photo']['properties_id']));
	}}
