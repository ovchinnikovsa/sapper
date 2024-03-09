<?php

    use UI\Draw\Path;

    function dd($value): void {
        var_dump($value);
        die();
    }

    function session_set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    function session_get($key) {
        return $_SESSION[$key] ?? null;
    }

    function session_clear_value($key): void {
        unset($_SESSION[$key]);
    }

    function redirect(string $path): void {
        header('Location: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $path);
        die();
    }

    function post($key, $value = null) {
        if ($value) {
            $_POST[$key] = $value;
            return true;
        }
        return $_POST[$key] ?? null;
    }