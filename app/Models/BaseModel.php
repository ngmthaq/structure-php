<?php

namespace App\Models;

use PDO;

abstract class BaseModel
{
    protected PDO $conn;

    public function __construct()
    {
        $this->conn = $GLOBALS["conn"];
    }
}
