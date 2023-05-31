<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    private UserRepository $userRepo;

    public function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepository();
    }

    public function getAllUsers(): array
    {
        return $this->userRepo->getAllUsers();
    }
}
