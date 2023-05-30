<?php

namespace App\Responses;

final class BaseResponse
{
    public function view(string $name, array $data = [], int $code = STT_OK)
    {
        view($name, $data, $code);
    }

    public function  json(array $data, int $code = STT_OK, string $mesage = "Empty")
    {
        json($data, $code, $mesage);
    }
}
