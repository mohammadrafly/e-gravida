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

//Guest Routes
$routes->get('/', 'Home::index');
$routes->get('artikel/(:num)', 'Home::artikel/$1');
$routes->get('artikel/kategori/(:num)', 'Home::artCat/$1');



$routes->get('login', 'Home::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Home::register');
$routes->post('register', 'Auth::store');
$routes->get('logout', 'Auth::logout');

$routes->group('dashboard', ['filter' => 'authGuard'], function ($routes) {
    //Global Routes
    $routes->get('/', 'Dashboard::index');
    $routes->group('profile', function ($routes) {
        $routes->get('(:num)', 'Profile::index/$1');
        $routes->post('password', 'Profile::updatePassword');
        $routes->post('detail', 'Profile::updateProfile');
    });
    //Customer Routes
    $routes->group('kondisikehamilan', function ($routes) {
        $routes->get('(:num)', 'Hamil::index/$1');
        $routes->post('store', 'Hamil::store');
    }); 
    $routes->get('jadwal/(:num)', 'Jadwal::index/$1');
    $routes->get('jadwal/detail/(:num)', 'Jadwal::detail/$1');
    $routes->group('laporan', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('kandungan', 'Hamil::selectDate');
        $routes->get('users', 'Users::selectDate');
        $routes->get('jadwal', 'Schedule::selectDate');
    });
    //Admin Routes
    $routes->group('post', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Post::index');
        $routes->get('add', 'Post::add');
        $routes->post('add', 'Post::store');
        $routes->post('update', 'Post::update');
        $routes->get('edit/(:num)', 'Post::edit/$1');
        $routes->get('delete/(:num)', 'Post::delete/$1');
    });
    $routes->group('kategori', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Kategori::index');
        $routes->get('add', 'Kategori::add');
        $routes->post('add', 'Kategori::store');
        $routes->post('update', 'Kategori::update');
        $routes->get('edit/(:num)', 'Kategori::edit/$1');
        $routes->get('delete/(:num)', 'Kategori::delete/$1');
    });
    $routes->group('jadwal', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Jadwal::indexAdmin');
        $routes->get('add', 'Jadwal::add');
        $routes->post('add', 'Jadwal::store');
        $routes->post('update', 'Jadwal::update');
        $routes->get('edit/(:num)', 'Jadwal::edit/$1');
        $routes->get('delete/(:num)', 'Jadwal::delete/$1');
        $routes->get('detail/(:num)', 'Jadwal::detail/$1');
    });
    $routes->group('user', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('add', 'Users::add');
        $routes->post('add', 'Users::store');
        $routes->post('update', 'Users::update');
        $routes->get('edit/(:num)', 'Users::edit/$1');
        $routes->get('delete/(:num)', 'Users::delete/$1');
    });
    $routes->group('kandungan', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Hamil::index');
        $routes->get('admin', 'Hamil::indexAdmin');
        $routes->post('update', 'Hamil::update');
        $routes->get('edit/(:num)', 'Hamil::edit/$1');
    });
    $routes->group('phone', ['filter' => 'authGuardAdmin'], function ($routes) {
        $routes->get('/', 'Phone::index');
        $routes->get('add', 'Phone::add');
        $routes->post('add', 'Phone::store');
        $routes->post('update', 'Phone::update');
        $routes->get('edit/(:num)', 'Phone::edit/$1');
        $routes->get('delete/(:num)', 'Phone::delete/$1');
    });
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
