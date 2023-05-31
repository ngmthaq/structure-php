<?php

namespace App\Services;

use Database;

abstract class BaseService
{
    protected Database $db;

    public function __construct()
    {
        $this->db = $GLOBALS[GLOBALS_DATABASE];
    }
}
