<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login','Home::login');
$routes->get('/register','Home::register');
$routes->post('/login/submit','Auth::auth');
$routes->post('/register/submit','Auth::register_submit');
$routes->get('/user/settings/(:num)','Home::usersetting/$1');
$routes->post('/user/settings/update','Home::userupdate');
$routes->get('/forgot-password','Home::change_password');
$routes->post('/user/password/update','Home::passwordupdate');
$routes->get('/logout','Home::session_terminate');
$routes->get('/book/detail','Home::book_detail');
$routes->get('/user/add','Admin::user_add');
$routes->get('/admin','Admin::index');
$routes->post('/user/input','Admin::user_input');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
