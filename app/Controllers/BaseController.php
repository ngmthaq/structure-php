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
        $GLOBALS["databasse"] = $this->db;
    }
}
