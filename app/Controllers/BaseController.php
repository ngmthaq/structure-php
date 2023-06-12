<?php

namespace App\Controllers;

use App\Responses\BaseResponse;
use Database;

abstract class BaseController
{
    protected Database $db;

    protected BaseResponse $res;

    public function __construct()
    {
        $this->res = new BaseResponse();
        $this->db = new Database();
        $GLOBALS[GLOBALS_DATABASE] = $this->db;

        if (empty($_SESSION[KEY_CSRF_TOKEN])) {
            $_SESSION[KEY_CSRF_TOKEN] = uuid();
        }

        if (isset($_SERVER["REQUEST_METHOD"]) && strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
            if (empty($_POST[KEY_CSRF_TOKEN]) || (isset($_POST[KEY_CSRF_TOKEN]) && $_POST[KEY_CSRF_TOKEN] !== $_SESSION[KEY_CSRF_TOKEN])) {
                view("errors.403", [], STT_FORBIDDEN);
                exit();
            }
        }
    }
}
