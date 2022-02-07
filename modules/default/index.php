<?php

function dd($value): void
{
    var_dump($value);
    die();
}

function session_set(string $key, $value): void
{
    $_SESSION[$key] = $value;
}

function session_get($key): array
{
    return $_SESSION[$key];
}
