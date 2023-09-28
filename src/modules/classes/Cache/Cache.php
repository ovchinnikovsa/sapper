<?php

namespace Module\Cache;

use Module\Cache\CacheInterface;

class Cache implements CacheInterface
{
    const SAVE_DIR = __DIR__ . '/../../../cache/';

    public static function get($key)
    {
        $filePath = self::SAVE_DIR . "{$key}.json";

        if (self::exists($key)) {
            return file_get_contents(json_decode($filePath, true));
        }

        return null;
    }

    public static function set($key, $value)
    {
        $filePath = self::SAVE_DIR . "{$key}.json";

        return file_put_contents($filePath, json_encode($value));
    }

    public static function delete($key)
    {
        if (self::exists($key)) {
            $filePath = self::SAVE_DIR . "{$key}.json";

            unlink($filePath);
        }

        return true;
    }

    private static function exists($key)
    {
        $filePath = self::SAVE_DIR . "{$key}.json";
        if (file_exists($filePath)) {
            return true;
        }

        return false;
    }
}