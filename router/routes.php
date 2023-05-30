<?php

/**
 * Define routes here
 */

use App\Controllers\ViewController;

$router->get("/", ViewController::class, "index");
