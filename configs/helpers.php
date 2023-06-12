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
    ob_start();
    echo $blade->run($name, $data);
    $content = ob_get_contents();
    ob_clean();
    $content = trim(preg_replace('/\s\s+/', ' ', $content));
    echo "<!-- Copyright Nguyen Manh Thang (C) --> ";
    echo $content;
}

function json(array $data, int $code = STT_OK, string $mesage = "OK")
{
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($code);
    $response = ["message" => $mesage, "code" => $code, "data" => $data];
    echo json_encode($response);
}

function assets(string $path)
{
    return "./$path?t=" . time();
}

function writeLog(string $fileName, string $message, string $status = LOG_STATUS_INFO)
{
    $date = gmdate("Y_m_d") . "_utc";
    $path = DIR_CACHED . DIRECTORY_SEPARATOR . "logs" . DIRECTORY_SEPARATOR . $fileName . "_" . $date . ".log";
    if (!file_exists($path)) touch($path);
    $time = "[" . gmdate("H:i:s") . "-UTC]";
    $content = $time . " - " . $status . ": " . $message . PHP_EOL;
    file_put_contents($path, $content, FILE_APPEND);
}

function uuid()
{
    return vsprintf('%s%s-%s-%s-%s-%s%s', str_split(bin2hex(random_bytes(16)), 4));
}

function csrfInputTag()
{
    $token = $_SESSION[KEY_CSRF_TOKEN];
    $name = KEY_CSRF_TOKEN;
    echo "<input type=\"hidden\" name=\"$name\" value=\"$token\" />";
}

function csrfMetaTag()
{
    $token = $_SESSION[KEY_CSRF_TOKEN];
    $name = KEY_CSRF_TOKEN;
    echo "<meta name=\"$name\" content=\"$token\" />";
}
