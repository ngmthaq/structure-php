<?php

namespace App\Controllers;


class ViewController extends BaseController
{
    public function index()
    {
        $this->res->view("home");
    }
}
