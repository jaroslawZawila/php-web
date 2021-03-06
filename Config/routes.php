<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
//    Router::connect('/', array('controller' => 'posts', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
    Router::connect('/about', array('controller' => 'pages', 'action' => 'display', 'about'));
    Router::connect('/home', array('controller' => 'home', 'action' => 'index'));
    Router::connect('/landlords', array('controller' => 'pages', 'action' => 'display', 'landlords'));
    Router::connect('/sellers', array('controller' => 'pages', 'action' => 'display', 'sellers'));
    Router::connect('/contact', array('controller' => 'requests', 'action' => 'add'));
    Router::connect('/forsale', array('controller' => 'properties', 'action' => 'index', 'forsale'));
    Router::connect('/tolet', array('controller' => 'properties', 'action' => 'index', 'tolet'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect('/admin/request/view', array('controller' => 'requests', 'action' => 'index'));
    Router::connect('/admin/customer/add', array('controller' => 'customers', 'action' => 'add'));
    Router::connect('/admin/customer/view', array('controller' => 'customers', 'action' => 'index'));
    Router::connect('/admin/properties/view', array('controller' => 'properties', 'action' => 'lists'));
    Router::connect('/admin/viewings/view', array('controller' => 'viewings', 'action' => 'index'));
    Router::connect('/admin/home', array('controller' => 'home', 'action' => 'adminhome'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
