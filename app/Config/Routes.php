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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'PageController::dashboard');

// Guru
$routes->get('/guru', 'GuruController::index');
$routes->get('guru/lihat/(:any)', 'GuruController::lihat/$1');
$routes->add('/guru/new', 'GuruController::new');
$routes->add('/guru/save', 'GuruController::save');
$routes->add('/guru/edit/(:any)', 'GuruController::edit/$1');
$routes->add('/guru/update/(:any)', 'GuruController::update/$1');
$routes->get('/guru/delete/(:any)', 'GuruController::delete/$1');

//Siswa
$routes->get('/siswa', 'SiswaController::index');
$routes->get('siswa/lihat/(:any)', 'SiswaController::lihat/$1');
$routes->add('/siswa/new', 'SiswaController::new');
$routes->add('/siswa/save', 'SiswaController::save');
$routes->add('/siswa/edit/(:any)', 'SiswaController::edit/$1');
$routes->add('/siswa/update/(:any)', 'SiswaController::update/$1');
$routes->get('/siswa/delete/(:any)', 'SiswaController::delete/$1');

//Kegiatan
$routes->get('/kegiatan', 'KegiatanController::index');
$routes->get('kegiatan/lihat/(:any)', 'KegiatanController::lihat/$1');
$routes->add('/kegiatan/new', 'KegiatanController::new');
$routes->add('/kegiatan/save', 'KegiatanController::save');
$routes->add('/kegiatan/edit/(:any)', 'KegiatanController::edit/$1');
$routes->add('/kegiatan/update/(:any)', 'KegiatanController::update/$1');
$routes->get('/kegiatan/delete/(:any)', 'KegiatanController::delete/$1');

//Jadwal
$routes->get('/jadwal', 'JadwalController::index');
$routes->add('/jadwal/new', 'JadwalController::new');
$routes->add('/jadwal/save', 'JadwalController::save');
$routes->add('/jadwal/edit/(:any)', 'JadwalController::edit/$1');
$routes->add('/jadwal/update/(:any)', 'JadwalController::update/$1');
$routes->get('/jadwal/delete/(:any)', 'JadwalController::delete/$1');

//Laporan
$routes->get('/laporansiswa', 'LaporanController::laporansiswa');
$routes->get('/laporanperminggu', 'LaporanController::laporanperminggu');

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
