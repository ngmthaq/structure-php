<?php

/**
 * Start PHP session
 */
session_start();

/**
 * Initial autoload PSR-4
 */
require_once("../vendor/autoload.php");

/**
 * Import configs
 */
require_once("../configs/application.php");
require_once("../configs/directory.php");
require_once("../configs/constants.php");
require_once("../configs/helpers.php");
require_once("../configs/database.php");

/**
 * Import router configs
 */
require_once("../router/configs.php");

$router = new Router();

/**
 * Define routes
 */
require_once("../router/routes.php");

$router->register();
