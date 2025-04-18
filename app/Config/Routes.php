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

// Admin
$routes->group('reports', function ($routes) {
    $routes->get('', 'Reports::reports');
    $routes->get('details/(:num)', 'Reports::report_details/$1');
});

// Admin
$routes->group('admin', function ($routes) {
    $routes->get('', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');

    $routes->get('reports/details/(:num)', 'Admin::report_details/$1');
});
