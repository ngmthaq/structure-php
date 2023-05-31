<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    private UserRepository $userRepo = new UserRepository();

    public function getAllUsers(): array
    {
        return $this->userRepo->getAllUsers();
    }
}
