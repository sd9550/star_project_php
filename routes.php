<?php
$router->get('/', 'HomeController@index');
$router->get('/stars', 'StarController@index');
$router->get('/stars/create', 'StarController@create');
$router->get('/stars/{id}', 'StarController@show');
$router->post('/stars', 'StarController@store');
