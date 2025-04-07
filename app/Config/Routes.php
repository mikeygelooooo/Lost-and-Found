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
