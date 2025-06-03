<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'User\Pages::landing');
$routes->get('home', 'User\Pages::landing');

// Auth
$routes->group('', function($routes) {
    $routes->get('signup', 'User\Auth::signup');
    $routes->post('signup', 'User\Auth::register');
    $routes->get('login', 'User\Auth::login');
    $routes->post('login', 'User\Auth::authenticate');
    $routes->get('logout', 'User\Auth::logout');
});

// User Profile
$routes->group('profile', function ($routes) {
    $routes->get('details', 'User\Profiles::profile_details');
    $routes->get('update', 'User\Profiles::edit_profile');
    $routes->post('update', 'User\Profiles::update_profile');

    $routes->get('update/profile-picture', 'User\Profiles::change_profile_picture');
    $routes->post('update/profile-picture', 'User\Profiles::upload_profile_picture');

    $routes->get('report-history', 'User\Profiles::report_history');

    $routes->get('account-settings', 'User\Profiles::account_settings');
    $routes->post('update/password', 'User\Profiles::update_password');
    $routes->post('delete-account', 'User\Profiles::delete_account');
});

// About
$routes->group('about', function ($routes) {
    $routes->get('', 'User\Pages::about');
    $routes->get('contact', 'User\Pages::contact');
    $routes->get('privacy-policy', 'User\Pages::privacy_policy');
    $routes->get('terms-of-service', 'User\Pages::terms_of_service');
});

// Reports
$routes->group('reports', function ($routes) {
    // Browse Reports
    $routes->get('', 'User\Reports::reports');
    $routes->get('details/(:num)', 'User\Reports::report_details/$1');

    // Create Report
    $routes->post('create', 'User\Reports::create_report');
    $routes->get('create/(:segment)', 'User\Reports::new_report/$1');

    // Update Report
    $routes->get('update/(:num)', 'User\Reports::edit_report/$1');
    $routes->post('update/(:num)', 'User\Reports::update_report/$1');
    $routes->post('update/status/(:num)', 'User\Reports::update_status/$1');

    // Delete Report
    $routes->post('delete/(:num)', 'User\Reports::delete_report/$1');
});

// Admin
$routes->group('admin', function ($routes) {
    $routes->get('', 'Admin\Pages::dashboard');
    $routes->get('dashboard', 'Admin\Pages::dashboard');

    // Reports Management
    $routes->get('reports', 'Admin\Reports::reports');
    $routes->get('reports/details/(:num)', 'Admin\Reports::report_details/$1');
    // Create Report
    $routes->post('reports/create', 'Admin\Reports::create_report');
    $routes->get('reports/create/(:segment)', 'Admin\Reports::new_report/$1');
    // Update Report
    $routes->get('reports/update/(:num)', 'Admin\Reports::edit_report/$1');
    $routes->post('reports/update/(:num)', 'Admin\Reports::update_report/$1');
    // Update Report Status
    $routes->post('reports/update/status/(:num)', 'Admin\Reports::update_status/$1');
    // Delete Report
    $routes->post('reports/delete/(:num)', 'Admin\Reports::delete_report/$1');
    
    // User Management
    $routes->get('users', 'Admin\Users::users');
    $routes->get('users/details/(:num)', 'Admin\Users::user_details/$1');
    // Create User
    $routes->get('users/create', 'Admin\Users::new_user');
    $routes->post('users/create', 'Admin\Users::create_user');
    // Update User
    $routes->get('users/update/(:num)', 'Admin\Users::edit_user/$1');
    $routes->post('users/update/(:num)', 'Admin\Users::update_user/$1');
    $routes->post('users/update/role/(:num)', 'Admin\Users::update_role/$1');
    $routes->get('users/update/profile-picture/(:num)', 'Admin\Users::change_profile_picture/$1');
    $routes->post('users/update/profile-picture/(:num)', 'Admin\Users::upload_profile_picture/$1');
    $routes->get('users/update/password/(:num)', 'Admin\Users::change_password/$1');
    $routes->post('users/update/password/(:num)', 'Admin\Users::update_password/$1');
    // Delete User
    $routes->post('users/delete/(:num)', 'Admin\Users::delete_user/$1');
});
