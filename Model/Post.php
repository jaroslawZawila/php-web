<?php
/**
 * Created by PhpStorm.
 * User: jaroslaw
 * Date: 29/01/14
 * Time: 19:44
 */

class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}
