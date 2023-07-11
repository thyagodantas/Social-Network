<?php
session_start();
date_default_timezone_set('America/Recife');
require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'http://localhost/social/Sistema/Views/Pages/');
define('INCLUDE_PATH', 'http://localhost/social/');

$app = new Sistema\Application();



$app->run();

?>

