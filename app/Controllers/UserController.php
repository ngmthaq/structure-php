<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController extends BaseController
{
    private UserService $userService = new UserService();

    public function getAllUsers()
    {
        $users = $this->userService->getAllUsers();
        $this->res->json(compact("users"));
    }
}
