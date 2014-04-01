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

}
