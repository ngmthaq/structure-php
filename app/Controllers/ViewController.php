<?php

namespace App\Controllers;

use PDO;

class ViewController extends BaseController
{
    public function index()
    {
        $this->db->setSql("SELECT * FROM users");
        $stm = $this->db->execute();
        if ($stm) {
            $this->res->json($stm->fetchAll());
        }
    }
}
