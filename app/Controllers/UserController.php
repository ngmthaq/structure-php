<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Repositories\UserRepository;
use App\Requests\BaseRequest;

class UserController extends BaseController
{
    private UserRepository $userRepo;

    public function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepository();
    }

    public function getAllUsers()
    {
        $users = $this->userRepo->getAllUsers();
        $this->res->json(compact("users"));
    }

    public function login()
    {
        $req = new BaseRequest();
        $auth = new AuthModel();
        $email = $req->inputs["email"];
        $password = $req->inputs["password"];
        $isLogin = $auth->loginWithCredential($email, $password);
        if ($isLogin) {
            redirect("/");
        } else {
            redirect("/login");
        }
    }

    public function logout()
    {
        $auth = new AuthModel();
        $auth->logout();
        redirect("/login");
    }
}
