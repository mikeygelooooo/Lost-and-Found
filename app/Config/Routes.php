<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Pages::landing');
$routes->get('home', 'Pages::landing');

// Auth
$routes->group('', function($routes) {
    $routes->get('signup', 'Auth::signup');
    $routes->post('signup', 'Auth::register');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::authenticate');
    $routes->get('logout', 'Auth::logout');
});

// User Profile
$routes->group('profile', function ($routes) {
    $routes->get('details', 'Profiles::profile_details');
    $routes->get('update', 'Profiles::edit_profile');
    $routes->post('update', 'Profiles::update_profile');

    $routes->get('change-profile-picture', 'Profiles::change_profile_picture');
    $routes->post('upload-profile-picture', 'Profiles::upload_profile_picture');

    $routes->get('account-settings', 'Profiles::account_settings');
    $routes->post('update-password', 'Profiles::update_password');
    $routes->post('delete-account', 'Profiles::delete_account');
});

// About
$routes->group('about', function ($routes) {
    $routes->get('', 'Pages::about');
    $routes->get('privacy-policy', 'Pages::privacy_policy');
    $routes->get('terms-of-service', 'Pages::terms_of_service');
});

// Reports
$routes->group('reports', function ($routes) {
    // Browse Reports
    $routes->get('', 'Reports::reports');
    $routes->get('details/(:num)', 'Reports::report_details/$1');

    // Create Report
    $routes->post('create', 'Reports::create_report');
    $routes->get('create/(:segment)', 'Reports::new_report/$1');

    // Update Report
    $routes->get('update/(:num)', 'Reports::edit_report/$1');
    $routes->post('update/(:num)', 'Reports::update_report/$1');

    // Delete Report
    $routes->post('delete/(:num)', 'Reports::delete_report/$1');
});

// Admin
$routes->group('admin', function ($routes) {
    $routes->get('', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');

    $routes->get('reports/details/(:num)', 'Admin::report_details/$1');
});
