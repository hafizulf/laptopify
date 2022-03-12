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
$routes->get('login', 'Auth\Login::index');
$routes->get('logout', 'Auth\Logout::index');

$routes->get('/', 'Home::index');
$routes->get('kriteria', 'Kriteria::index');
$routes->get('sub-kriteria', 'Subkriteria::index');
$routes->get('sub-kriteria/create', 'Subkriteria::create_page');
$routes->get('bobot/index', 'Bobot::index');
$routes->get('alternatif/index', 'Alternatif::index');
$routes->get('perhitungan/nilai-kriteria', 'Hitung::hitungNilaiKriteria');
$routes->get('perhitungan/nilai-utility', 'Hitung::hitungNilaiUtility');
$routes->get('perhitungan/nilai-akhir', 'Hitung::hitungNilaiAkhir');
$routes->get('user-profile', 'User::index');

$routes->get('manage-user', 'Admin\ManageUser::index', ['filter' => 'role:Admin']);
$routes->get('manage-role', 'Admin\ManageRole::index', ['filter' => 'role:Admin']);

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
