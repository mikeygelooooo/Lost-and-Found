<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Pages::landing');
$routes->get('home', 'Pages::landing');

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
    $routes->get('new/(:segment)', 'Reports::new_report/$1');
    $routes->post('create', 'Reports::create_report');

    // Update Report
    $routes->get('edit/(:num)', 'Reports::edit_report/$1');
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
