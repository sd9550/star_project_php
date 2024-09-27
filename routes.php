<?php
$router->get('/', 'HomeController@index');

$router->get('/stars', 'StarController@index');
$router->get('/stars/create', 'StarController@create');
$router->get('/stars/{id}', 'StarController@show');
$router->post('/stars', 'StarController@store');

$router->get('/auth/register', 'UserController@create');
$router->post('/auth/register', 'UserController@store');
$router->post('/auth/login', 'UserController@login');
$router->post('/auth/logout', 'UserController@logout');
