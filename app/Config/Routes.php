<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/save_register', 'Auth::save_register');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/profile', 'Admin::profile');
$routes->get('/admin/kos', 'Admin::kos');
$routes->get('/admin/kamar', 'Admin::kamar');
$routes->get('/admin/fasilitas', 'Admin::fasilitas');
$routes->get('/admin/penyewaan', 'Admin::penyewaan');
$routes->get('/admin/akun-admin', 'Admin::akun_admin');

$routes->get('/admin/setting', 'Setting::index');
$routes->post('/admin/update-setting', 'Setting::update_setting');

$routes->get('/admin/fakultas', 'Fakultas::index');
$routes->get('/admin/add-fakultas', 'Fakultas::add_fakultas');
$routes->post('/admin/save-fakultas', 'Fakultas::save_fakultas');
$routes->get('/admin/edit-fakultas/(:any)', 'Fakultas::edit_fakultas/$1');
$routes->post('/admin/edit-fakultas/(:any)', 'Fakultas::update_fakultas/$1');
$routes->get('/admin/delete-fakultas/(:any)', 'Fakultas::delete_fakultas/$1');

$routes->get('/', 'User::index');
