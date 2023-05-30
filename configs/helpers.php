<?php

use eftec\bladeone\BladeOne;

function dump(mixed $data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "<br/>";
}

function dumpAndDie(mixed $data)
{
    dump($data);
    die();
}

function view(string $name, array $data = [], int $code = STT_OK)
{
    $view = str_replace(DIRECTORY_SEPARATOR, "/", DIR_RESOURCES . DIRECTORY_SEPARATOR . "views");
    $cache = str_replace(DIRECTORY_SEPARATOR, "/", DIR_CACHED . DIRECTORY_SEPARATOR . "views");
    $blade = new BladeOne($view, $cache, $_ENV["APP_ENV"] === "prod" ? BladeOne::MODE_AUTO : BladeOne::MODE_DEBUG);
    $blade->pipeEnable = true;
    header('Content-Type: text/html; charset=utf-8');
    http_response_code($code);
    echo $blade->run($name, $data);
}

function json(array $data, int $code = STT_OK, string $mesage = "Empty")
{
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($code);
    $response = ["message" => $mesage, "code" => $code, "data" => $data];
    echo json_encode($response);
}
