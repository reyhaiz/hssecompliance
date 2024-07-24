<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'PublicRegulationController::index');
$routes->get('regulation/detail/(:num)', 'PublicRegulationController::detail/$1');
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('login/forgot_password', 'Login::forgot_password');
$routes->post('login/send_reset_link', 'Login::send_reset_link');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/manage_regulation', 'Admin::manage_regulation');
$routes->get('admin/add_regulation', 'Admin::add_regulation');
$routes->post('admin/save_regulation', 'Admin::save_regulation');
$routes->get('admin/edit_regulation/(:num)', 'Admin::edit_regulation/$1');
$routes->post('admin/update_regulation', 'Admin::update_regulation');
$routes->get('admin/delete_regulation/(:num)', 'Admin::delete_regulation/$1');
$routes->get('admin/detail_regulation/(:num)', 'Admin::detail_regulation/$1');
$routes->get('superadmin/dashboard', 'SuperAdmin::dashboard');
$routes->get('superadmin/manage_admin', 'SuperAdmin::manage_admin');
$routes->get('superadmin/add_admin', 'SuperAdmin::add_admin');
$routes->post('superadmin/save_admin', 'SuperAdmin::save_admin');
$routes->get('superadmin/edit_admin/(:num)', 'SuperAdmin::edit_admin/$1');
$routes->post('superadmin/update_admin', 'SuperAdmin::update_admin');
$routes->get('superadmin/delete_admin/(:num)', 'SuperAdmin::delete_admin/$1');
$routes->get('superadmin/profile', 'SuperAdmin::profile');
$routes->get('/about', 'PublicRegulationController::about');
