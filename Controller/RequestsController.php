<?php
App::uses('AppController', 'Controller');
/**
 * Requests Controller
 *
 * @property Request $Request
 * @property Requestdetail $Requestdetail
 * @property PaginatorComponent $Paginator
 */
class RequestsController extends AppController {

    public $uses = array('Requestdetail', 'Request');
    public function beforeFilter() {
        $this->Auth->allow('add');
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 10,
        'fields' => array('id','name', 'type', 'status', 'date'),
        'order' => array(
            'Requests.date' => 'desc'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
        try {
            $this->Paginator->settings = $this->paginate;
            $this->set('requests', $this->Paginator->paginate('Requests'));
        } catch (NotFoundException $e) {
            $this->redirect( array('action'=>'index'));
        }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
		$this->set('request', $this->Request->find('first', $options));
        $this->set('comments', $this->Requestdetail->find('all', array('conditions' => array('Requestdetail.requests_id'=> $id),
                                                                        'order' => array('Requestdetail.date DESC'))));
	}


    public function applyStatus() {
        if ($this->request->is('post')) {
            $data = array('requests_id' => $this->request->data['Request']['requests_id'],
                          'comment' => "Status changed to " . $this->request->data['Request']['status']);

            $this->Request->read(null, $this->request->data['Request']['requests_id']);
            $this->Request->set(array('status' => $this->request->data['Request']['status']));
            $this->Request->save();

            $this->Requestdetail->create();
            if ($this->Requestdetail->save($data,  array('fieldList' => array('comment', 'requests_id')))) {

            } else {
                $this->Session->setFlash(__('The request could not be updated. Please, try again.'));
            }
        }
        return $this->redirect(array('controller'=> 'requests', 'action' => 'view', $this->request->data['Request']['requests_id']));
    }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Request->create();
			if ($this->Request->save($this->request->data, array('fieldList' => array('name','email','phone','type','message'))) ) {
				$this->Session->setFlash('The request has been send.','default', array('class' => 'alert alert-success', 'style' => 'font-size:medium;'));
				$this->request->data = null;
			} else {
				$this->Session->setFlash('The request could not be send. Please, contact us by phone.','default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Request->save($this->request->data)) {
				$this->Session->setFlash(__('The request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
			$this->request->data = $this->Request->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Request->id = $id;
		if (!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid request'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Request->delete()) {
			$this->Session->setFlash(__('The request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
