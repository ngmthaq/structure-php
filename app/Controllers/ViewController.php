<?php

namespace App\Controllers;


class ViewController extends BaseController
{
    public function index()
    {
        dump($_SERVER);
    }
}