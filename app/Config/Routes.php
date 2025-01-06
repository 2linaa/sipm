<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Landingpage
$routes->get('/home', 'Home::index');
//pendaftaran
$routes->group('internship', function($routes) {
    $routes->post('submit', 'Internship::submit');
    $routes->post('check_status', 'Internship::check_status');
});
//laporan
$routes->get('laporan', 'LaporanController::create', ['filter'=>'role:user']);
$routes->post('laporan/store', 'LaporanController::store', ['filter'=>'role:user']);
//feedback
$routes->get('/feedback', 'Feedback::index', ['filter'=>'role:admin,user,kapus']);
$routes->get('/feedback/add', 'Feedback::create', ['filter'=>'role:user']);
$routes->post('/feedback/store', 'Feedback::store', ['filter'=>'role:user']);

$routes->get('/', 'User::index',['filter'=>'role:admin,user,kapus']);
$routes->get('/profile', 'User::index', ['filter'=>'role:admin,user,kapus']);
//get list user dan detail
$routes->get('/admin/index', 'Admin::index', ['filter'=>'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter'=>'role:admin']);
//get list pendaftar dan konfirmasi pendaftaran
$routes->get('/admin/daftar', 'Admin::daftar', ['filter'=>'role:admin']);
$routes->get('admin/confirm/(:num)/(:segment)', 'Admin::confirm/$1/$2', ['filter'=>'role:admin']);
//lihat daftar laporan
$routes->get('/admin/buku', 'LaporanController::index', ['filter'=>'role:admin,user,kapus']);
//dashboard
$routes->get('/admin/dashboard', 'Admin::dashboardData', ['filter'=>'role:admin,kapus']);

