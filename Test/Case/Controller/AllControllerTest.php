<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 22/04/14
 * Time: 22:40
 */

class AllControllerTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All controller tests');
        $suite->addTestDirectory(TESTS . 'Case/Controller');
        return $suite;
    }
}
