<?php

namespace App\Repositories;

use Database;

abstract class BaseRepository
{
    protected Database $db;

    public function __construct()
    {
        $this->db = $GLOBALS["database"];
    }
}
