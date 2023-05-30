<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

abstract class BaseController
{
    protected function view(string $name, array $data = [], int $code = STT_OK)
    {
        view($name, $data, $code);
    }

    protected function  json(array $data, int $code = STT_OK, string $mesage = "Empty")
    {
        json($data, $code, $mesage);
    }
}
