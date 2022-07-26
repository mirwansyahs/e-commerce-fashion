<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Auth
$routes->get('/masuk', 'Auth::index');
$routes->post('/login', 'Auth::proccess');
$routes->get('/daftar', 'Auth::register');
$routes->post('/register', 'Auth::save');
$routes->get('/lupa-kata-sandi', 'Auth::forgotPassword');
$routes->post('/forgotpassword', 'Auth::forgotPasswordProccess');
$routes->get('/setel-ulang-kata-sandi', 'Auth::resetPassword');
$routes->post('/resetPassword', 'Auth::resetPasswordProccess');
$routes->get('/keluar', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/kategori', 'Category::index');
$routes->get('/tambah-kategori', 'Category::add');
$routes->post('/savecategory', 'Category::save');
$routes->get('/edit-kategori/(:num)', 'Category::edit/$1');
$routes->put('/updatecategory/(:any)', 'Category::update/$1');
$routes->delete('/hapus-kategori/(:segment)', 'Category::delete/$1');

$routes->get('/diskon', 'Discount::index');
$routes->get('/tambah-diskon', 'Discount::add');
$routes->post('/savediscount', 'Discount::save');
$routes->get('/edit-diskon/(:num)', 'Discount::edit/$1');
$routes->put('/updatediscount/(:any)', 'Discount::update/$1');
$routes->delete('/hapus-diskon/(:segment)', 'Discount::delete/$1');

$routes->get('/produk', 'Product::index');
$routes->get('/tambah-produk', 'Product::add');
$routes->post('/saveproduct', 'Product::save');
$routes->get('/edit-produk/(:num)', 'Product::edit/$1');
$routes->put('/updateproduct/(:any)', 'Product::update/$1');
$routes->delete('/hapus-produk/(:segment)', 'Product::delete/$1');

$routes->get('/pelanggan', 'Costumer::index');

$routes->get('/chat', 'Chat::index');
$routes->get('/list', 'Chat::list');
$routes->post('/send', 'Chat::send');

$routes->get('/profil', 'Profile::index');
$routes->post('/save', 'Profile::save');

$routes->get('/ubah-kata-sandi', 'ChangePassword::index');
$routes->post('/changepassword', 'ChangePassword::save');

$routes->get('/pengaturan', 'Setting::index');
$routes->post('/savesetting', 'Setting::save');

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
