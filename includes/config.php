<?php
// Archivo para incluir solo las configuraciones, sin HTML
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/conect.php';

define('BASE_URL', '/finalProgramacion2/');
define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMG_URL', ASSETS_URL . 'img/');
define('ADMIN_URL', BASE_URL . 'admin/');
define('CARRERAS_URL', BASE_URL . 'carreras/');

date_default_timezone_set('America/Argentina/Buenos_Aires');
?>