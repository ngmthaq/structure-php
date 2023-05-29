<?php

session_start();

// Autoload
require_once("../vendor/autoload.php");

// Configs
require_once("../configs/application.php");
require_once("../configs/directory.php");
require_once("../configs/helpers.php");

// Router
require_once("../routes/router.php");

$router = new Router();

// Define routes
require_once("../routes/web.php");
require_once("../routes/api.php");

$router->register();
