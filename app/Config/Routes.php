<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::home');
$routes->get('about', 'AboutController::about');
$routes->get('contact', 'ContactController::contact');
$routes->get('registration', 'Auth\RegisterController::registUser');
$routes->post('register', 'Auth\RegisterController::register');
$routes->get('login', 'Auth\LoginController::loginUser');
$routes->post('logincheck', 'Auth\LoginController::checkUser');
$routes->get('logout', 'Auth\LoginController::logout');

$routes->get('dashboard', 'User\DashboardController::index');
$routes->get('faucet', 'User\DashboardController::faucet');
$routes->get('referral', 'User\DashboardController::referral');
$routes->get('withdraw', 'User\DashboardController::withdraw');
$routes->get('setting', 'User\DashboardController::setting');

$routes->post('faucet-run', 'FaucetController::running');