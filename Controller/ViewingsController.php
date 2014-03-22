<?php
App::uses('AppController', 'Controller');
/**
 * Viewings Controller
 *
 * @property Viewing $Viewing
 * @property PaginatorComponent $Paginator
 */
class ViewingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

        public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(); // We can remove this line after we're finished
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Viewing->recursive = 0;
		$this->set('viewings', $this->Viewing->get_viewings_all());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Viewing->exists($id)) {
			throw new NotFoundException(__('Invalid viewing'));
		}
		$options = array('conditions' => array('Viewing.' . $this->Viewing->primaryKey => $id));
		$this->set('viewing', $this->Viewing->find('first', $options));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Viewing->create();
            $this->request->data['Viewing']['status'] = 'New';
			if ($this->Viewing->save($this->request->data,  array('fieldList' => array('comment', 'customers_id', 'properties_id', 'date', 'status')))) {
				$this->Session->setFlash(__('The viewing has been saved.'));

			} else {
				$this->Session->setFlash(__('The viewing could not be saved. Please, try again.'));
			}
		}
        return $this->redirect(array('controller'=> 'customers','action' => 'view', $this->request->data['Viewing']['customers_id']));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Viewing->exists($id)) {
			throw new NotFoundException(__('Invalid viewing'));
		}
		if ($this->request->is(array('post', 'put')) && $this->request->data['Viewing'] != null) {
            $this->Viewing->read(null, $id);
            $this->Viewing->set(array(
                'date' =>  $this->request->data['Viewing']['date'],
                'comment' => $this->request->data['Viewing']['comment'],
                'status' => $this->request->data['Viewing']['status']
            ));
			if ($this->Viewing->save()) {
				$this->Session->setFlash(__('The viewing has been updated.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The viewing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Viewing.' . $this->Viewing->primaryKey => $id));
			$this->request->data = $this->Viewing->find('first', $options);
            $viewing = $this->request->data;
            $this->set('property_address', $viewing['Properties']['houseno'] . ', ' . $viewing['Properties']['street'] . ', ' . $viewing['Properties']['city'] . ', ' . $viewing['Properties']['postcode']);
            $this->set('customer_name', $viewing['Customers']['firstname'] . ' ' .  $viewing['Customers']['surname']);
            $this->set('viewings', $viewing);
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
		$this->Viewing->id = $id;
		if (!$this->Viewing->exists()) {
			throw new NotFoundException(__('Invalid viewing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Viewing->delete()) {
			$this->Session->setFlash(__('The viewing has been deleted.'));
		} else {
			$this->Session->setFlash(__('The viewing could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
