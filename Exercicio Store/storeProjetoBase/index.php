<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$basePath = dirname($_SERVER['SCRIPT_NAME']);
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!str_starts_with($requestPath, $basePath)) {
    $basePath = dirname($basePath);
}
define('BASE_URL', rtrim($basePath, '/'));

function url(string $path = '/'): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/router.php';

$router = new Router();

require_once __DIR__ . '/routes.php';

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
