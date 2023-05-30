<?php

namespace App\Services;

use PDO;

abstract class BaseService
{
    protected PDO $conn;

    public function __construct()
    {
        $this->conn = $GLOBALS["conn"];
    }
}
