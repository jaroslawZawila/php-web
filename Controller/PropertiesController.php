<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
 * @property PaginatorComponent $Paginator
 */
class PropertiesController extends AppController {

    public $uses = array('Property', 'Photo');
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
        if(!empty($this->params->query['postcode'])){
            $conditions = $conditions + array('Property.postcode LIKE' => strtoupper($this->params->query['postcode']) . '%');
        }
        if(!empty($this->params->query['mina'])){
          $conditions = $conditions + array('Property.price >=' => $this->params->query['mina']);
        }
        if(!empty($this->params->query['max'])){
            $conditions = $conditions + array('Property.price <=' => $this->params->query['max']);
        }
        if(!empty($this->params->query['minbeds'])){
            $conditions = $conditions + array('Property.beds >=' => $this->params->query['minbeds']);
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

//        $this->set('properties', $this->Property->find('all', array(
//            'conditions' => $this->buildquery($conditions, $this->params->query)
//        )));
        $this->set('properties', $this->Property->get_all_sell($this->buildquery($conditions, $this->params->query)));

        $this->set('featureds', $this->Property->get_all_featured($this->featureds($conditions)));
        $this->set('minmax', $this->letprices());
        $this->set('resultstitle', 'To let:');
    }

    function forsell(){
        $conditions = array('Property.addtype =' => 'sale', 'Property.hide' => 'yes');

        $this->set('properties', $this->Property->get_all_sell($this->buildquery($conditions, $this->params->query)));

        $this->set('featureds', $this->Property->get_all_featured($this->featureds($conditions)));

        $this->set('minmax', $this->saleprices());
        $this->set('resultstitle', 'For sell:');
    }

	public function index($type = null) {

        if (!empty ($this->params->query['action'])){
            if($this->params->query['action'] == 'Let') {
                $type = 'tolet';
            }else if($this->params->query['action'] == 'Let') {
                $type = 'forrent';
            }
        }
        if($type == 'tolet') {
            $this->tolet();
        }else {
            $this->forsell();
        }
        if(!empty($this->params->query)){
            $this->params->data = array('Search' => $this->params->query);
        }

	}

    public function lists() {
        $this->Property->recursive = 0;
        $this->set('properties', $this->Paginator->paginate());
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
        $property = $this->Property->view_properties($id);
		$this->set('property', $property);

        $photos = $this->Photo->gets($id);
        $this->set('photos', $photos);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($customerid = null) {
		if ($this->request->is('post')) {
			$this->Property->create();
            $this->request->data['Property']['customers_id'] = $customerid;
            if($this->request->data['Property']['addtype'] == 'sale') {
                $this->request->data['Property']['status'] = 'for sale';
            } elseif ($this->request->data['Property']['addtype'] == 'let') {
                $this->request->data['Property']['status'] = 'to let';
            };
            $this->request->data['Property']['postcode'] = strtoupper($this->request->data['Property']['postcode']);
			if ($this->Property->save($this->request->data)) {
				return $this->redirect(array('action' => 'manage', $this->Property->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
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
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
        $this->Property->id = $id;
        if($this->request->data['Property']['addtype'] == 'sale') {
            $this->request->data['Property']['status'] = 'for sale';
        }elseif ($this->request->data['Property']['addtype'] == 'let') {
            $this->request->data['Property']['status'] = 'to let';
        };
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Property->save($this->request->data)) {
				$this->Session->setFlash(__('The property has been saved.'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Property.' . $this->Property->primaryKey => $id));
			$this->request->data = $this->Property->find('first', $options);
		}
        return $this->redirect(array('action' => 'manage', $id));
//		$customers = $this->Property->Customer->find('list');
//		$this->set(compact('customers'));
	}


    public function manage($id = null, $cid = null) {
        if (!$this->Property->exists($id)) {
            throw new NotFoundException(__('Invalid property'));
        }
        $property = $this->Property->view_properties($id);

        if($property['Property']['beds'] == 0) {
            $property['Property']['beds'] = 'bedside';
        }

        $this->set('property', $property);
        $this->set('photos', $this->Photo->gets($id));
        $this->set('docs', array());

        if($cid == null) {
            $this->set('back', "/admin/properties/view");
        }else {
            $this->set('back', "/customers/view/" . $cid);
        }
    }

    public function update_description() {
        if ($this->request->is(array('post', 'put'))) {
            $this->Property->id = $this->request->data['Property']['id'];
            if ($this->Property->save($this->request->data)) {
                $this->Session->setFlash(__('The description has been updated.'));
            } else {
                $this->Session->setFlash(__('The description could not be updated. Please, try again.'));
            }
        }
            return $this->redirect(array('action' => 'manage', $this->request->data['Property']['id']));
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
