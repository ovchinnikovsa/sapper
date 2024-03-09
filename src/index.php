<?php

declare(strict_types=1);
error_reporting(0);
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/modules/index.php';

use Module\Core\Session;
use Module\Core\View;

View::page('index');
