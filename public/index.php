<?php
use Framework\Database;
require __DIR__ . '/../vendor/autoload.php';
use Framework\Router;
require '../helpers.php';

$router = new Router();
$routes = require(basePath('routes.php'));
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);

?>


