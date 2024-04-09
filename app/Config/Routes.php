<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::home');
$routes->get('about', 'AboutController::about');
$routes->get('contact', 'ContactController::contact');
$routes->get('registration', 'Auth\RegisterController::registUser');
$routes->get('login', 'Auth\LoginController::loginUser');