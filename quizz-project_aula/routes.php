<?php
use router as router;
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
//quizz
$router->get('/', 'QuizzController@home');
$router->post('/', 'QuizzController@setName');
$router->get('/quizz', 'QuizzController@index');
$router->post('/quizz/submit', 'QuizzController@submit');
$router->get('/quizz/result', 'QuizzController@result');

//admin question
$router->get('/admin/questions', 'QuestionController@index');
$router->get('/admin/questions/create', 'QuestionController@create');
$router->post('/admin/questions/create', 'QuestionController@setUpAnswers');
$router->post('/admin/questions/store', 'QuestionController@store');
$router->get('/admin/questions/{id}/edit', 'QuestionController@edit');
$router->post('/admin/questions/{id}', 'QuestionController@update');
$router->post('/admin/questions/{id}/delete', 'QuestionController@destroy');

// auth
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->post('/logout', 'AuthController@logout');




