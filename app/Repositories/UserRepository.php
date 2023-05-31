<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository extends BaseRepository
{
    public function getAllUsers(): array
    {
        $this->db->setSql("SELECT * FROM users");
        $stm = $this->db->execute();
        if (!$stm) return [];
        $rawUsers = $stm->fetchAll();
        $users = array_map(function ($rawUser) {
            $user = new UserModel();
            $user->id = $rawUser->id;
            $user->name = $rawUser->name;
            return $user;
        }, $rawUsers);
        return $users;
    }
}
