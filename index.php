<?php

define('TEMPLATES_PATH', __DIR__ . '/templates');

require_once __DIR__ . '/lib/functions.php';
require_once __DIR__ . '/lib/connections.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$segments = explode('/', $uri);
$controller = empty($uri) ? 'maps' : array_shift($segments);
$path = __DIR__ . "/controller/{$controller}.php";

if (is_readable($path)) {
    require_once $path;
} else {
    require_once __DIR__ . '/controller/404.php';
}

