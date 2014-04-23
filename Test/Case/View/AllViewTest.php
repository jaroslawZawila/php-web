<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 22/04/14
 * Time: 22:43
 */

class AllViewTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All view tests');
        $suite->addTestDirectory(TESTS . 'Case/View');
        return $suite;
    }
}