<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

$routes->get('/', 'Dashboard::index');
$routes->get('/logout', 'Auth::logout');

$routes->get('/user/profile', 'User::profile');
$routes->post('/user/profile/update', 'User::update');
$routes->post('/user/profile/password', 'User::updatepassword');

$routes->group('', ['filter' => 'menu'], function () use ($routes) {
    $routes->get('/role', 'Role::index');
    $routes->post('/role/menuaccess', 'Role::updatemenuaccess');
    $routes->get('/role/create', 'Role::create');
    $routes->post('/role/store', 'Role::store');
    $routes->get('/role/delete/(:num)', 'Role::delete/$1');
    $routes->get('/role/edit/(:num)', 'Role::edit/$1');
    $routes->get('/role/update/(:num)', 'Role::update/$1');
    $routes->get('/role/menuaccess/(:num)', 'Role::menuaccess/$1');

    $routes->get('/submenu', 'Submenu::index');
    $routes->get('/submenu/create', 'Submenu::create');
    $routes->post('/submenu/store', 'Submenu::store');
    $routes->get('/submenu/delete/(:num)', 'Submenu::delete/$1');
    $routes->get('/submenu/edit/(:num)', 'Submenu::edit/$1');
    $routes->get('/submenu/update/(:num)', 'Submenu::update/$1');

    $routes->get('/admin/user', 'User::index');
    $routes->get('/admin/user/create', 'User::create');
    $routes->post('/admin/user/store', 'User::store');
    $routes->post('/admin/user/delete/(:num)', 'User::delete/$1');

    $routes->get('/manu', 'Menu::index');
    $routes->get('/manu/create', 'Menu::create');
    $routes->post('/manu/store', 'Menu::store');
    $routes->get('/manu/delete/(:num)', 'Menu::delete/$1');
});

$routes->group('', ['filter' => 'guest'], function () use ($routes) {
    $routes->get('/login', 'Auth::login');
    $routes->post('/login', 'Auth::loginStore');

    $routes->get('/register', 'Auth::register');
    $routes->post('/register', 'Auth::registerStore');
});


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
