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

//User API Routes
$routes->post('blockuser', 'ApiController::blockUser');
$routes->post('unblockuser', 'ApiController::unblockUser');

//Delete API Routes
$routes->post('deleteresponder', 'ApiController::deleteResponder');
$routes->post('deletenewsfeed', 'ApiController::deleteNewsfeed');
$routes->post('deletenotice', 'ApiController::deleteNotice');
$routes->post('deleteprofessionalsupport', 'ApiController::deleteProfessionalSupport');
$routes->post('deleteprofessional', 'ApiController::deleteProfessional');
$routes->post('deletealert', 'ApiController::deleteAlert');

//Add API Routes
$routes->post('addresponder', 'ApiController::addResponder');
$routes->post('addnewsfeed', 'ApiController::addNewsfeed');
$routes->post('assignresponder', 'ApiController::assignResponder');
$routes->post('addnotice', 'ApiController::addNotice');
$routes->post('asssignprofessional', 'ApiController::assignProfessional');
$routes->post('addprofessional', 'ApiController::addProfessional');

//Edit API Routes
$routes->post('editresponder', 'ApiController::editResponder');
$routes->post('editnewsfeed', 'ApiController::editNewsfeed');
$routes->post('editnotice', 'ApiController::editNotice');
$routes->post('editprofessional', 'ApiController::editProfessional');
$routes->get('getpostdetails/(:num)', 'ApiController::getPostDetails/$1');
