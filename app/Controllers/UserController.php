<?php

namespace App\Controllers;

use App\Requests\BaseRequest;
use App\Services\UserService;

class UserController extends BaseController
{
    private UserService $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
    }

    public function getAllUsers()
    {
        $users = $this->userService->getAllUsers();
        $this->res->json(compact("users"));
    }

    public function login()
    {
        $req = new BaseRequest();
        dump($req->inputs);
    }
}
