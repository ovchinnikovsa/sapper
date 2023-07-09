<?php
namespace Core;

class Session
{
    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function clear(string $key)
    {
        unset($_SESSION[$key]);
    }
}