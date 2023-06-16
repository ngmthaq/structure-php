<?php

/**
 * Define routes here
 */

use App\Controllers\UserController;
use App\Controllers\ViewController;

// Web Routes (GET)
$router->get("/", ViewController::class, "index");
$router->get("/login", ViewController::class, "login");

// Web Routes (POST)
$router->post("/login", UserController::class, "login");
$router->post("/logout", UserController::class, "logout");

// API Routes (GET)
$router->get("/api/users", UserController::class, "getAllUsers");

// API Routes (POST)
