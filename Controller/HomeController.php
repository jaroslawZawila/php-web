<?php
/**
 * Created by PhpStorm.
 * User: jaroslaw
 * Date: 02/02/14
 * Time: 19:08
 */

class HomeController  extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index'); // We can remove this line after we're finished
    }

    public function index(){

    }

} 