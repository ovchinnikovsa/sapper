<?php
use UI\Draw\Path;

function dd($value): void
{
    var_dump($value);
    die();
}

function session_set(string $key, $value): void
{
    $_SESSION[$key] = $value;
}

function session_get($key)
{
    return $_SESSION[$key];
}

function session_clear_value($key): void
{
    unset($_SESSION[$key]);
}

function redirect(string $path): void
{
    // dd('Location: https://' . $_SERVER['SERVER_NAME'] . $path);
    header('Location: http://' . $_SERVER['SERVER_NAME'] . $path);
    die();
}

function post($key, $value = null)
{
    if ($value)
    {
        $_POST[$key] = $value;
        return true;
    }
    return $_POST[$key];
}