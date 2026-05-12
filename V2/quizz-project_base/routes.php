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
$router->get('/quizz', 'QuizzController@show');
$router->post('/quizz', 'QuizzController@submit');