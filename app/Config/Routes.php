<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'jwt'], function($routes) {
    $routes->get('dashboard', 'PortalController::dashboard');
    $routes->get('responders', 'PortalController::responders');
    $routes->get('newsfeeds', 'PortalController::newsfeeds');
    $routes->get('alerts', 'PortalController::alerts');
    $routes->get('notices', 'PortalController::notices');
    $routes->get('professional_support', 'PortalController::professionalSupport');
    $routes->get('personal_diary', 'PortalController::personalDiary');
});
$routes->get('/', 'AuthController::index');
// $routes->get('/', 'Auth::login');
$routes->get('login', 'AuthController::login');
$routes->post('attemptLogin', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');
$routes->post('dashboard', 'PortalController::dashboard');
$routes->post('responders', 'PortalController::responders');
$routes->post('newsfeeds', 'PortalController::newsfeeds');
$routes->post('alerts', 'PortalController::alerts');
$routes->post('notices', 'PortalController::notices');
$routes->post('professional_support', 'PortalController::professionalSupport');
$routes->post('personal_diary', 'PortalController::personalDiary');
$routes->post('blockuser', 'ApiController::blockUser');
$routes->post('unblockuser', 'ApiController::unblockUser');


