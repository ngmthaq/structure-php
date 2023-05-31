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
    }
}
