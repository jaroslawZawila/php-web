<?php
App::uses('AppController', 'Controller');
/**
 * Requestdetails Controller
 *
 * @property Requestdetail $Requestdetail
 * @property PaginatorComponent $Paginator
 */
class RequestdetailsController extends AppController {


    public function beforeFilter() {
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
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Requestdetail->exists($id)) {
			throw new NotFoundException(__('Invalid requestdetail'));
		}
		$options = array('conditions' => array('Requestdetail.' . $this->Requestdetail->primaryKey => $id));
		$this->set('requestdetail', $this->Requestdetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Requestdetail->create();
			if ($this->Requestdetail->save($this->request->data,  array('fieldList' => array('comment', 'requests_id')))) {
				return $this->redirect(array('controller'=> 'requests', 'action' => 'view', $this->request->data['Requestdetail']['requests_id']));
			} else {
				$this->Session->setFlash(__('The requestdetail could not be saved. Please, try again.'));
			}
		}
        return $this->redirect(array('controller'=> 'requests', 'action' => 'view', $this->request->data['Requestdetail']['requests_id']));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Requestdetail->exists($id)) {
			throw new NotFoundException(__('Invalid requestdetail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Requestdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The requestdetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requestdetail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Requestdetail.' . $this->Requestdetail->primaryKey => $id));
			$this->request->data = $this->Requestdetail->find('first', $options);
		}
		$requests = $this->Requestdetail->Request->find('list');
		$this->set(compact('requests'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Requestdetail->id = $id;
		if (!$this->Requestdetail->exists()) {
			throw new NotFoundException(__('Invalid requestdetail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Requestdetail->delete()) {
			$this->Session->setFlash(__('The requestdetail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The requestdetail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
