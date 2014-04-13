<?php
/**
 * Created by PhpStorm.
 * User: jaroslaw
 * Date: 02/02/14
 * Time: 19:08
 */

class HomeController  extends AppController {

    public $uses = array('Offer', 'Request', 'Viewing');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(); // We can remove this line after we're finished
    }

    public function index(){

    }

    public function adminhome() {
        $requests = $this->Request->find('all', array(
            'conditions' => array(
            'status' => 'NEW'
        ),
            'limit' => 10,
            'order' => 'date DESC'
        ));

        $viewings = $this->Viewing->find('all', array(
            'conditions' => array(
                'date LIKE' => date('d/m/Y', time())  . "%"
            ),
            'limit' => 10,
            'order' => 'date ASC'
        ));

        $offers = $this->Offer->find('all', array(
            'conditions' => array(
                'Offer.status' => 'NEW'
            )
        ));

        $this->set('offers', $offers);
        $this->set('requests', $requests);
        $this->set('viewings', $viewings);
    }

} 