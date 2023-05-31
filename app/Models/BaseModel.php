<?php

namespace App\Models;

use Database;

abstract class BaseModel
{
    protected Database $db;

    public function __construct()
    {
        $this->db = $GLOBALS[GLOBALS_DATABASE];
    }
}
