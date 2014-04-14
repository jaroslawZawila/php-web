<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 */
class StaffsController extends AppController {

    public $uses = array('Staff', 'User', 'Group');

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
		$this->Staff->recursive = 0;
		$this->set('staffs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Cannot find member of staff.'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
        $this->set('groups', $this->Group->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
                $this->User->create();
                $this->User->save(array('User'=>array('username'=>$this->request->data['Staff']['username'])));
                $this->Staff->set('users_id', $this->User->id);
                $this->Staff->save();
				$this->Session->setFlash(__('The staff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Cannot find member of staff.'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->Staff->read(null, $id);
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The records has been updated.'));
                return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The staff could not be edited. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
        return $this->redirect(array('action' => 'index'));
	}

    public function terminate($id) {
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Cannot find member of staff.'));
        }
        $this->Staff->read(null, $id);
        $date = date('d/m/Y', time());
        $this->Staff->set(array(
            'fdate' => $date
        ));
        if ($this->Staff->save()) {
            $this->Session->setFlash(__('The staff has been terminated.'));
            return $this->redirect(array('action' => 'view', $id));
        } else {
            $this->Session->setFlash(__('Cannot terminate eployment. Please, try again.'));
        }
    }
}
