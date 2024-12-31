<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');

$routes->group('internship', function($routes) {
    $routes->post('submit', 'Internship::submit');
    $routes->post('check_status', 'Internship::check_status');
    // $routes->get('confirm/(:num)', 'Internship::confirm/$1');
});

$routes->get('admin/confirm/(:num)/(:segment)', 'Admin::confirm/$1/$2', ['filter'=>'role:admin']);

$routes->get('laporan', 'LaporanController::create', ['filter'=>'role:user']);
$routes->post('laporan/store', 'LaporanController::store', ['filter'=>'role:user']);

$routes->get('buku', 'Laporan::index');
$routes->get('/feedback', 'Feedback::index', ['filter'=>'role:admin,user,kapus']);
$routes->get('/feedback/add', 'Feedback::create', ['filter'=>'role:user']);
$routes->post('/feedback/store', 'Feedback::store', ['filter'=>'role:user']);

$routes->get('/', 'User::index');
$routes->get('/profile', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter'=>'role:admin']);
$routes->get('/admin/buku', 'LaporanController::index', ['filter'=>'role:admin,user,kapus']);
$routes->get('/admin/index', 'Admin::index', ['filter'=>'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter'=>'role:admin']);
$routes->get('/admin/daftar', 'Admin::daftar', ['filter'=>'role:admin']);
$routes->get('/admin/dashboard', 'Admin::dashboardData', ['filter'=>'role:admin,kapus']);

