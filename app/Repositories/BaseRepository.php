<?php

namespace App\Repositories;

use PDO;

abstract class BaseRepository
{
    protected PDO $conn;

    public function __construct()
    {
        $this->conn = $GLOBALS["conn"];
    }
}
