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
        $users = array_map(function (mixed $rawUser): UserModel {
            $user = new UserModel();
            $user->uuid = $rawUser->uuid;
            $user->name = $rawUser->name;
            $user->email = $rawUser->email;
            return $user;
        }, $rawUsers);
        return $users;
    }

    public function getUserByUuid(string $uuid): UserModel|null
    {
        $this->db->setSql("SELECT * FROM users WHERE uuid = :uuid");
        $this->db->setValue(":uuid", $uuid);
        $stm = $this->db->execute();
        if (!$stm) return null;
        $rawUser = $stm->fetch();
        $user = new UserModel();
        $user->uuid = $rawUser->uuid;
        $user->name = $rawUser->name;
        $user->email = $rawUser->email;
        return $user;
    }
}
