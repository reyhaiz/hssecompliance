<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/regulations', 'RegulationController::index');
$routes->get('/regulations/detail/(:segment)', 'RegulationController::detail/$1');
$routes->get('/regulations/add', 'RegulationController::add');
$routes->post('/regulations/create', 'RegulationController::create');
$routes->get('/regulations/edit/(:segment)', 'RegulationController::edit/$1');
$routes->post('/regulations/update/(:segment)', 'RegulationController::update/$1');
$routes->get('/regulations/delete/(:segment)', 'RegulationController::delete/$1');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/dashboard', 'DashboardController::index');
