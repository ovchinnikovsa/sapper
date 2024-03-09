<?php
session_start();
error_reporting(0);
require_once __DIR__ . '/../modules/index.php';

if (post('reset'))
{
    $difficult = get_difficult();
    $_SESSION = [];
    $size = get_difficult_presets()[$difficult]['size'] ?? false;
    if ($size)
    {
        set_map_size($size);
    } else {
        set_map_size();
    }
    set_difficult($difficult);
}

if (post('difficult'))
{
    $_SESSION = [];
    $diffucult = post('difficult');
    $size = get_difficult_presets()[$diffucult]['size'];
    set_map_size($size);
    set_difficult($diffucult);
}

redirect('/');
