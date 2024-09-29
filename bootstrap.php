<?php
define('__DIR_ROOT', __DIR__);

// Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}
else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

$folder = str_replace('\\', '/', strtolower(__DIR_ROOT));
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', $folder);
$web_root = $web_root.$folder;
define('_WEB_ROOT', $web_root);

require_once 'configs/routes.php';  // Load routes
require_once './core/Route.php';  // Load Route
require_once 'app/App.php'; // Load app
require_once 'core/Controller.php';   // Load base Controller