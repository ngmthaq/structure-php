<?php

namespace App\Models;

class AuthModel extends BaseModel
{
    public string $token;

    public UserModel|null $user;

    public function __construct()
    {
        parent::__construct();
        $authToken = isset($_COOKIE[KEY_AUTH_TOKEN]) ? $_COOKIE[KEY_AUTH_TOKEN] :  null;
        if (!$authToken) $authToken = isset($_SESSION[KEY_AUTH_TOKEN]) ? $_SESSION[KEY_AUTH_TOKEN] :  null;
        $this->token = isset($authToken) ? $authToken : "";
    }

    protected function getAuthUser(): UserModel|null
    {
        if ($this->token === "") return null;
        $map = explode(TEMPLATE_AUTH_TOKEN_SPLITTER, $this->token);
        $uuid = $map[1];
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
