<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

$routes->get('/', 'Home::index');
$routes->get('/regulations', 'RegulationController::index');
$routes->get('/regulation/add', 'RegulationController::add');
$routes->post('/regulation/create', 'RegulationController::create');
$routes->get('/regulation/edit/(:segment)', 'RegulationController::edit/$1');
$routes->post('/regulation/update/(:segment)', 'RegulationController::update/$1');
$routes->get('/regulation/delete/(:segment)', 'RegulationController::delete/$1');
$routes->get('/regulation/detail/(:segment)', 'RegulationController::detail/$1');

