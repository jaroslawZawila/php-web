<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
 * @property PaginatorComponent $Paginator
 */
class PropertiesController extends AppController {


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
    function saleprices() {
        return array('100000' => "£ 100,000",
            '110000' => "£ 110,000",
            '120000' => "£ 120,000",
            '130000' => "£ 130,000",
            '140000' => "£ 140,000");
    }

    function letprices() {
        return array('100' => "£100 PCM",
            '200' => "£200 PCM",
            '300' => "£300 PCM",
            '400' => "£400 PCM",
            '500' => "£500 PCM",
            '600' => "£600 PCM",
            '700' => "£700 PCM",
            '800' => "£800 PCM",
            '900' => "£900 PCM",
            '1000' => "£1000 PCM",
            '1250' => "£1250 PCM",
            '1500' => "£1500 PCM",
            '1750' => "£1750 PCM",
            '2000' => "£2000 PCM");
    }

    function buildquery($conditions, $params) {
//
        if(!empty($this->params->query['mina'])){
          $conditions = $conditions + array('Property.price >=' => $this->params->query['mina']);
        }
        if(!empty($this->params->query['max'])){
            $conditions = $conditions + array('Property.price <' => $this->params->query['max']);
        }
        if(!empty($this->params->query['minbeds'])){
            $conditions = $conditions + array('Property.beds >=' => $this->params->query['minbeds']);
            $this->Session->setflash('I am here');
        }
        if(!empty($this->params->query['maxbeds'])){
            $conditions = $conditions + array('Property.beds <=' => $this->params->query['maxbeds'] );
        }
        if(!empty($this->params->query['type'])){
            $conditions = $conditions + array('Property.hometype =' => $this->params->query['type']);
        }
        return $conditions;
    }

    function featureds($conditions) {
        $conditions = $conditions + array(
            'Property.featured =' => 'yes');
        return $conditions;
    }

    function tolet(){
        $conditions = array('Property.addtype =' => 'let');

        $this->set('properties', $this->Property->find('all', array(
            'conditions' => $this->buildquery($conditions, $this->params->query)
        )));

        $this->set('featureds', $this->Property->find('all', array(
            'conditions' => $this->featureds($conditions)
        )));
        $this->set('minmax', $this->letprices());
        $this->set('resultstitle', 'To let:');
    }

    function forsell(){
        $conditions = array('Property.addtype =' => 'sale');

        $this->set('properties', $this->Property->find('all', array(
            'conditions' => $this->buildquery($conditions, $this->params->query)
        )));

        $this->set('featureds', $this->Property->find('all', array(
            'conditions' => $this->featureds($conditions)
        )));
        $this->set('minmax', $this->saleprices());
        $this->set('resultstitle', 'For sell:');
    }

	public function index($type) {

        if($type == 'tolet') {
            $this->tolet();
        }else {
            $this->forsell();
        }
        if(!empty($this->params->query)){
            $this->params->data = array('Search' => $this->params->query);
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
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
		$this->set('property', $this->Property->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Property->create();
			if ($this->Property->save($this->request->data)) {
				$this->Session->setFlash(__('The property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Property->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Property->save($this->request->data)) {
				$this->Session->setFlash(__('The property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
			$this->request->data = $this->Property->find('first', $options);
		}
		$customers = $this->Property->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Property->delete()) {
			$this->Session->setFlash(__('The property has been deleted.'));
		} else {
			$this->Session->setFlash(__('The property could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
