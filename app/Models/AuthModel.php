<?php

namespace App\Models;

class AuthModel extends BaseModel
{
    const TOKEN_EXPIRED = 86400 * 30;

    public string $token;

    public UserModel|null $user;

    public function __construct()
    {
        parent::__construct();
        $authToken = isset($_COOKIE[KEY_AUTH_TOKEN]) ? $_COOKIE[KEY_AUTH_TOKEN] :  null;
        if (!$authToken) $authToken = isset($_SESSION[KEY_AUTH_TOKEN]) ? $_SESSION[KEY_AUTH_TOKEN] :  null;
        $this->token = isset($authToken) ? $authToken : "";
        $this->user = $this->getAuthUser();
    }

    public function loginWithCredential(string $email, string $password, bool $isRemember = false)
    {
        $this->db->setSql("SELECT * FROM users WHERE email = :email");
        $this->db->setValue(":email", $email);
        $stm = $this->db->execute();
        $user = $stm->fetch();

        if (!$user) {
            setFlashMessage("loginError", "Email or password is not correct");
            return false;
        }

        $hashPassword = md5($password);
        if (strcmp($user->password, $hashPassword) !== 0) {
            setFlashMessage("loginError", "Email or password is not correct");
            return false;
        }

        if ($isRemember) {
            setcookie(KEY_AUTH_TOKEN, $user->uuid, time() + static::TOKEN_EXPIRED);
        } else {
            $_SESSION[KEY_AUTH_TOKEN] = $user->uuid;
        }

        $this->token = $user->uuid;
        $this->user = $this->getAuthUser();
        return true;
    }

    public function loginWithUserUuid(string $uuid, bool $isRemember = false)
    {
        $this->db->setSql("SELECT * FROM users WHERE uuid = :uuid");
        $this->db->setValue(":uuid", $uuid);
        $stm = $this->db->execute();
        $user = $stm->fetch();

        if (!$user) {
            setFlashMessage("loginError", "User uuid is not correct");
            return false;
        }

        if ($isRemember) {
            setcookie(KEY_AUTH_TOKEN, $user->uuid, time() + static::TOKEN_EXPIRED);
        } else {
            $_SESSION[KEY_AUTH_TOKEN] = $user->uuid;
        }

        $this->token = $user->uuid;
        $this->user = $this->getAuthUser();
        return true;
    }

    public function logout()
    {
        unset($_COOKIE[KEY_AUTH_TOKEN]);
        setcookie(KEY_AUTH_TOKEN, "", -1);
        unset($_SESSION[KEY_AUTH_TOKEN]);
        $this->token = "";
        $this->user = null;
        return true;
    }

    public function authCheck()
    {
        return $this->user !== null;
    }

    protected function getAuthUser(): UserModel|null
    {
        if ($this->token === "") return null;
        $this->db->setSql("SELECT * FROM users WHERE uuid = :uuid");
        $this->db->setValue(":uuid", $this->token);
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
