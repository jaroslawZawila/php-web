<?php
App::uses('AppController', 'Controller');
/**
 * Offers Controller
 *
 * @property Offer $Offer
 * @property PaginatorComponent $Paginator
 */
class OffersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    var $uses = array('Offer', 'Property', 'Customer');

    public $paginate = array(
        'limit' => 10
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Offer->recursive = 0;
		$this->set('offers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Offer cannot be found.'));
		}
		$options = array('conditions' => array('Offer.' . $this->Offer->primaryKey => $id));
		$offer =  $this->Offer->find('first', $options);
        $this->set('offer', $offer);
        $this->set('comment', $offer['Offer']['comment']);

        $options2 = array('conditions' => array('Customer.id =' => $offer['Offer']['customers_id']));
        $customer =  $this->Customer->find('first', $options2);
        $this->set('customer', $customer);
	}

    public function update($method ,$id = null) {
        if (!$this->Offer->exists($id)) {
            throw new NotFoundException(__('Offer cannot be found.'));
        }

        $result = $this->Offer->read(null, $id);
        $this->Offer->set('status', $method);
        if($this->Offer->save()){
            $ids = $result['Offer']['properties_id'];
            $this->Property->read(null, $ids);
            if($method == "ACCEPTED") {
                $this->Property->set('status', 'Sold');
                $this->Offer->updateAll(
                    array('Offer.status' => "'REJECTED'"),
                    array('AND' => array( array('Offer.properties_id =' => $ids),
                                          array('Offer.status =' => "NEW")))
                );

            } else {
                $n = $this->Offer->find('count', array('conditions' => array('AND' => array( array('Offer.properties_id =' => $ids),
                                                                                             array('Offer.status =' => "NEW")))));
                if($n == 0) {
                    $this->Property->set('status', 'For sale');}
            };
            $this->Property->save();
            $this->Session->setFlash(__('The offer has been updated.'));
        }else {
            $this->Session->setFlash(__('There was some problem. Please try again.'));
        };
        return $this->redirect(array('action' => 'view', $id));
    }

    public function editComment() {
        if ($this->request->is('post')) {
            $id = $this->request->data['Offers']['id'];

            if ($this->Offer->exists($id)) {
                $this->Offer->read(null, $id);
                $this->Offer->set('comment', $this->request->data['Offers']['comment']);
                if ($this->Offer->save($this->request->data)) {
                    $this->Session->setFlash(__('The comment has been updated.'));
                } else {
                    $this->Session->setFlash(__('There was some problem. Please try again.'));
                }
                return $this->redirect(array('action' => 'view', $this->request->data['Offers']['id']));
            }
            $this->Session->setFlash(__('Cannot find offer.'));
            return $this->redirect(array('action' => 'index'));
        }
        return $this->redirect(array('action' => 'index'));
    }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Offer->create();
			if ($this->Offer->save($this->request->data)) {
                $this->Property->read(null, $this->request->data['Offer']['properties_id']);
                $this->Property->set('status', "Offer made");
                if($this->Property->save()){
				    $this->Session->setFlash(__('The offer has been saved.'));
				    return $this->redirect(array('action' => 'index'));
                };
                $this->set('x', $this->Property->invalidFields());
			} else {
				$this->Session->setFlash(__('There was some problem. Please try again.'));
			}
		}

        $this->set('properties', $this->Property->find('list', array('fields' => array('list_properties'))));
        $this->set('customers', $this->Customer->find('list', array('fields' => array('list_properties'))));
	}
}
