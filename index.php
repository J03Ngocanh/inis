<?php
ob_start();
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
require_once dirname(__FILE__) . '/core/routers.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$router = new Router();
// echo "Chuỗi file";
//  echo $_SERVER['REQUEST_URI'] 11111;
$router->dispatch($_SERVER['REQUEST_URI']);

?>