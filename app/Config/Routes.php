<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Login::index');

$routes->get('/', 'Admin::index', ['filter' => 'login']);

//Menampilkan Halaman Login
$routes->get('login', 'Login::index');
//Menampilkan halaman Register
$routes->get('register', 'Register::index');


$routes->group('Admin', ['filter' => 'login'], function ($routes) {
    $routes->get('index', 'Admin::index');
    $routes->get('user', 'Admin::user', ['filter' => 'role:admin']);
    $routes->get('detail/(:num)', 'Admin::detail/$1');
    $routes->get('detail_data/(:num)', 'Admin::detail_data/$1');
    $routes->get('data', 'Admin::data');
    $routes->get('qrcode', 'Admin::qrcode');
    $routes->get('roda2', 'Admin::roda2');
    $routes->get('roda4', 'Admin::roda4');
    $routes->get('masuk', 'Admin::masuk');
    // //Routes Untuk Menjalankan Perintah Post (Save Data di Controller Perkir)
    $routes->post('save_data', 'Admin::save_data', ['filter' => 'role:admin']);
    // //Routes Untuk Menjalankan Perintah Post (Update Data di Controller Perkir)
    $routes->post('update_data/(:num)', 'Admin::update_data/$1', ['filter' => 'role:admin']);
    // //Routes Untuk Menjalankan Perintah Get (Hapus Data di Controller Perkir)
    $routes->get('hapus_data/(:num)', 'Admin::hapus_data/$1', ['filter' => 'role:admin']);
});

$routes->get('home', 'Home::index');
$routes->get('home/add', 'Home::add');
$routes->post('home/save', 'Home::save');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
