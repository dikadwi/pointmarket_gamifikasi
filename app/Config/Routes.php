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




$routes->get('Login/detail', 'Login::detail');

$routes->get('registerMhs', 'Register::registerMhs');
$routes->post('Register/add', 'Register::add');

$routes->get('/', 'Admin::index',  ['filter' => 'login']);

// //Menampilkan Halaman Login Admin
$routes->get('login', 'Login::index');
// $routes->get('logout', 'Login::logout');

// //Menampilkan Halaman Login Admin
$routes->get('loginMhs', 'Login::loginMhs');
$routes->post('Login/process', 'Login::process');
$routes->get('logoutM', 'Login::logoutM');
// //Menampilkan halaman Register
// $routes->get('register', 'Register::index');
// $routes->post('Register/add', 'Register::add');

// Group untuk Controller Mahasiswa
$routes->group('Role_User', ['filter' => 'login_m'], function ($routes) {
    $routes->get('', 'Role_User::index');
    $routes->get('profile', 'Role_User::detail');
    $routes->post('save_email', 'Role_User::save_email');
    $routes->post('Update_Profile', 'Role_User::Update_Profile');
    $routes->get('data_transaksi', 'Role_User::data_transaksi');
    $routes->get('badges', 'Role_User::badges');
    $routes->get('reward', 'Role_User::reward');
    $routes->get('pembelian', 'Role_User::pembelian');
    $routes->get('punishment', 'Role_User::punishment');
    $routes->get('misi_tambahan', 'Role_User::misi');
});

// Group untuk Controller Mahasiswa
$routes->group('User', ['filter' => 'login'], function ($routes) {
    $routes->get('', 'User::index');
    $routes->post('save_Mhs', 'User::save_Mhs');
    $routes->post('update_Mhs/(:num)', 'User::update_Mhs/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});

// Group untuk Controller Transaksi
$routes->group('Transaksi', ['filter' => 'login'], function ($routes) {
    // ['filter' => 'role:admin']
    $routes->get('reward', 'Transaksi::reward');
    $routes->get('pembelian', 'Transaksi::pembelian');
    $routes->get('punishment', 'Transaksi::punishment');
    $routes->get('misi_tambah', 'Transaksi::misi_tambah');
    $routes->get('transaksi_reward', 'Transaksi::transaksi_reward');
    $routes->get('transaksi_pembelian', 'Transaksi::transaksi_pembelian');
    $routes->get('transaksi_punishment', 'Transaksi::transaksi_punishment');
    $routes->get('transaksi_misi_tambah', 'Transaksi::transaksi_misi_tambah');
    $routes->get('validasi', 'Transaksi::validasi');
    $routes->get('data_transaksi', 'Transaksi::data_transaksi');
    $routes->get('data_misitambah', 'Transaksi::data_misitambah');
    $routes->post('save_transaksi', 'Transaksi::save_transaksi');
    $routes->post('save_dataTransaksi', 'Transaksi::save_dataTransaksi', ['filter' => 'role:admin']);
    $routes->post('update_transaksi/(:num)', 'Transaksi::update_transaksi/$1');
    $routes->post('update_data_transaksi/(:num)', 'Transaksi::update_data_transaksi/$1');
    $routes->get('delete/(:num)', 'Transaksi::delete/$1');
    $routes->get('delete_data/(:num)', 'Transaksi::delete_data/$1');
});

// Group Routes untuk Controller Badges
$routes->group('Badges', ['filter' => 'login'], function ($routes) {
    $routes->get('', 'Badges::index');
    $routes->post('save_badges', 'Badges::save_badges');
    $routes->post('update_badges/(:num)', 'Badges::update_badges/$1');
    $routes->get('delete/(:num)', 'Badges::delete/$1');
});

// Group untuk Controller Admin
$routes->group('Admin', ['filter' => 'login'], function ($routes) {
    $routes->get('transaksi', 'Transaksi::badges');
    $routes->get('index', 'Admin::index');
    $routes->get('user', 'Admin::user', ['filter' => 'role:admin']);
    $routes->get('detail/(:num)', 'Admin::detail/$1');
    // $routes->get('detail_data/(:num)', 'Admin::detail_data/$1');
    $routes->get('data', 'Admin::data');
    $routes->get('printpdf', 'Admin::printpdf');
    $routes->get('cetakpdf/(:num)', 'Admin::cetakpdf/$1');
    $routes->get('qrcode', 'Admin::qrcode');
    $routes->get('roda2', 'Admin::roda2');
    $routes->get('roda4', 'Admin::roda4');
    $routes->get('masuk', 'Admin::masuk');
    //Routes Untuk Menjalankan Perintah Post (Save Data di Controller Perkir)
    $routes->post('save_jenistransaksi', 'Admin::save_jenistransaksi', ['filter' => 'role:admin']);
    //Routes Untuk Menjalankan Perintah Post (Save Data di Controller Perkir)
    $routes->post('save_transaksi', 'Admin::save_transaksi', ['filter' => 'role:admin']);
    //Routes Untuk Menjalankan Perintah Post (Save Data di Controller Perkir)
    $routes->post('save_data', 'Admin::save_data', ['filter' => 'role:admin']);
    //Routes Untuk Menjalankan Perintah Post (Update Data di Controller Perkir)
    $routes->post('update_data/(:num)', 'Admin::update_data/$1', ['filter' => 'role:admin']);
    //Routes Untuk Menjalankan Perintah Get (Hapus Data di Controller Perkir)
    $routes->get('hapus_data/(:num)', 'Admin::hapus_data/$1', ['filter' => 'role:admin']);
});

// $routes->get('notification', 'Message::showSweet');

// $routes->get('home', 'Home::index');
// $routes->get('home/scan', 'Home::scan');
// $routes->get('home/add', 'Home::add');
// $routes->post('home/save', 'Home::save');



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
