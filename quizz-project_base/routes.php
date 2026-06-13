<?php

// -------------------------------------------------------
// Routes
// -------------------------------------------------------
// Map URL patterns to Controller@method pairs.
// Routes are matched in the order they are defined.
// More specific routes must come before less specific ones.
//
// Syntax:
//   $router->get('/path',         'ControllerName@methodName');
//   $router->post('/path',        'ControllerName@methodName');
//
// Route parameters use {name} placeholders:
//   $router->get('/items/{id}',   'ItemController@show');
// The value of {id} is passed as the first argument to the method.
// -------------------------------------------------------

// Add routes here as you build each phase of the project.

$router->get('/', 'HomeController@index');
$router->get('/quiz', 'QuizController@show');
$router->post('/quiz', 'QuizController@submit');
$router->get('/ranking', 'HomeController@ranking');

//admin routes
$router->get('/admin', 'AdminController@loginForm');
$router->post('/admin', 'AdminController@login');
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/create', 'AdminController@createForm');
$router->post('/admin/create', 'AdminController@create');
$router->get('/admin/delete/{id}', 'AdminController@delete');
$router->get('/admin/logout', 'AdminController@logout');

//User Routes

$router->get('/register', 'UserController@create');
$router->post('/register', 'UserController@store');
$router->get('/login', 'UserController@loginForm');
$router->post('/login', 'UserController@login');