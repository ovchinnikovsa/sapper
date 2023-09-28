<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Module\Core\Session;

Session::set('test', 1);
var_dump(Session::get('test'));