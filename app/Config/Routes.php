<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

//start
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

//auth
$routes->get('/register', 'Home::register');
$routes->post('/login/submit', 'Auth::auth');
$routes->post('/register/submit', 'Auth::register_submit');
//frontend
$routes->get('/user/settings/(:num)', 'Home::usersetting/$1');
$routes->post('/user/settings/update', 'Home::userupdate');
$routes->post('/user/password/update', 'Home::passwordupdate');
$routes->get('/forgot-password', 'Home::change_password');
$routes->post('/user/delete', 'Home::deleteAccount');
$routes->get('/logout', 'Home::session_terminate');
$routes->get('/book/list', 'Home::book');
$routes->get('/book/detail/(:num)', 'Home::book_detail/$1');
$routes->get('/book/cari', 'Home::book_cari');
// backend user
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/user/index', 'User::user_index');
$routes->get('/user/add', 'User::user_add');
$routes->get('/user/edit/(:num)', 'User::user_edit/$1');
$routes->post('/user/input', 'User::user_input');
$routes->post('/user/update', 'User::user_update');
$routes->get('/user/user_delete/(:num)', 'User::user_delete/$1');
//backend buku
$routes->get('/book/index', 'Book::index');
$routes->get('/book/add', 'Book::tambah');
$routes->get('/book/edit/(:num)', 'Book::edit/$1');
$routes->post('book/input', 'Book::book_input');
$routes->post('/book/update/(:num)', 'Book::book_update/$1');
$routes->get('/book/delete/(:num)', 'Book::book_delete/$1');
//backend genre
$routes->get('/genre/index', 'Genre::index');
$routes->get('/genre/add', 'Genre::tambah');
$routes->get('/genre/edit/(:num)', 'Genre::edit/$1');
$routes->post('/genre/input', 'Genre::genre_input');
$routes->post('/genre/edit/update', 'Genre::genre_update');
$routes->get('/genre/delete/(:num)', 'Genre::delete/$1');
//backend quotes
$routes->get('/quote', 'Quote::index');
$routes->get('/quote/edit/(:num)', 'Quote::edit/$1');
$routes->get('/quote/tambah', 'Quote::tambah');
$routes->post('/quote/input', 'Quote::quote_input');
$routes->post('/quote/update', 'Quote::quote_update');
$routes->get('/quote/delete/(:num)', 'Quote::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
