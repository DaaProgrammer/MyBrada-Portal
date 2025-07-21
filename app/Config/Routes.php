<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'jwt'], function($routes) {
    $routes->get('dashboard', 'Portal::dashboard');
    $routes->get('responders', 'Portal::responders');
    $routes->get('newsfeeds', 'Portal::newsfeeds');
    $routes->get('alerts', 'Portal::alerts');
    $routes->get('notices', 'Portal::notices');
    $routes->get('professional_support', 'Portal::professionalSupport');
    $routes->get('personal_diary', 'Portal::personalDairy');
});
$routes->get('/', 'Auth::index');
// $routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('attemptLogin', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');


