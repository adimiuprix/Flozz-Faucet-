<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::home');
$routes->get('about', 'AboutController::about');
$routes->get('contact', 'ContactController::contact');
$routes->get('registration', 'Auth\RegisterController::registUser');
$routes->get('reff/(:any)', 'Auth\RegisterController::refflink/$1');
$routes->post('register', 'Auth\RegisterController::register');
$routes->get('login', 'Auth\LoginController::loginUser');
$routes->post('logincheck', 'Auth\LoginController::checkUser');
$routes->get('logout', 'Auth\LoginController::logout');

$routes->get('forget-password', 'Auth\RecoveryController::forget');
$routes->post('forget', 'Auth\RecoveryController::sendResetLink');
$routes->get('passcode', 'Auth\RecoveryController::passCode');
$routes->post('passing-otp', 'Auth\RecoveryController::passingOTP');
$routes->get('recovery', 'Auth\RecoveryController::setPassword/$1');
$routes->post('recpass', 'Auth\RecoveryController::recoveryPassword');

$routes->get('dashboard', 'User\DashboardController::index');
$routes->get('topup', 'User\DashboardController::topup');
$routes->get('faucet', 'User\DashboardController::faucet');
$routes->get('referral', 'User\DashboardController::referral');
$routes->get('withdraw', 'User\DashboardController::withdraw');
$routes->post('withdraw-request', 'User\DashboardController::faucetpay');
$routes->get('setting', 'User\DashboardController::setting');
$routes->post('settuser', 'User\DashboardController::updateUser');

$routes->post('faucet-run', 'FaucetController::running');