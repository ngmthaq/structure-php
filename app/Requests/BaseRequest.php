<?php

namespace App\Requests;

class BaseRequest
{
    public array $params;
    public array $inputs;
    public array $cookies;
    public array $files;

    public function __construct()
    {
        $this->params = $this->prepare($_GET);
        $this->inputs = $this->prepare($_POST);
        $this->cookies = $this->prepare($_COOKIE);
        $this->files = $_FILES;
    }

    protected function prepare($vars)
    {
        $output = array();
        foreach ($vars as $key => $value) {
            if (gettype($value) === "array") {
                $output[$key] = $this->prepare($value);
            } elseif (gettype($value) === "string") {
                $output[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            } else {
                $output[$key] = $value;
            }
        }
        return $output;
    }
}
