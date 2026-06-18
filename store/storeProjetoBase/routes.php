<?php

// Routes will be registered phase by phase.
// See docs/superpowers/plans/2026-06-03-refactor-to-eloquent.md

$router->get('/loja',         'LojaController@show');
$router->get('/loja/create',  'LojaController@create');
$router->post('/loja',        'LojaController@store');
$router->get('/loja/edit',    'LojaController@edit');
$router->post('/loja/edit',   'LojaController@update');

$router->get('/produto',                'ProdutoController@index');
$router->get('/produto/create',         'ProdutoController@create');
$router->post('/produto',               'ProdutoController@store');
$router->get('/produto/{id}',           'ProdutoController@show');
$router->get('/produto/{id}/edit',      'ProdutoController@edit');
$router->post('/produto/{id}',          'ProdutoController@update');
$router->get('/produto/{id}/delete',    'ProdutoController@delete');

$router->get('/',                                  'FaturaController@index');

$router->get('/fatura',                            'FaturaController@index');
$router->get('/fatura/create',                     'FaturaController@create');
$router->post('/fatura',                           'FaturaController@store');
// $router->post('/fatura',                           'FaturaController@estado');
$router->get('/fatura/{id}',                       'FaturaController@show');
$router->get('/fatura/{id}/edit',                  'FaturaController@edit');
$router->post('/fatura/{id}',                      'FaturaController@update');
$router->get('/fatura/{id}/delete',                'FaturaController@delete');

$router->get('/fatura/{id}/linhafatura/create',    'LinhaFaturaController@create');
$router->post('/linhafatura',                      'LinhaFaturaController@store');
$router->get('/linhafatura/{id}/delete',           'LinhaFaturaController@delete');
