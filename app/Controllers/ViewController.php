<?php

namespace App\Controllers;

class ViewController extends BaseController
{
    public function index()
    {
        $this->res->view("pages.home");
    }

    public function login()
    {
        $this->res->view("pages.login");
    }
}
