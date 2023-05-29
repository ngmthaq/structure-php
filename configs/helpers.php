<?php

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
