<?php

namespace Cache;

interface CacheInterface
{
    public static function get($key);
    public static function set($key, $value);
    public static function delete($key);
}