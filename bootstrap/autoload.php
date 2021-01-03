<?php if (!session_id()) @session_start();
require __DIR__ . "/../vendor/autoload.php";
use Bramus\Router\Router as RouterAlias;

$router = new RouterAlias();
require __DIR__ . "/../Route/web.php";

