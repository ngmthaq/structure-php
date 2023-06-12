<?php

/**
 * Define routes here
 */

use App\Controllers\UserController;
use App\Controllers\ViewController;

// Web Routes
$router->get("/", ViewController::class, "index");
$router->post("/login", UserController::class, "login");

// API Routes
$router->get("/api/users", UserController::class, "getAllUsers");
