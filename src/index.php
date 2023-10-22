<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Module\Core\Session;
use Module\Core\View;

Session::set('test', 1);
var_dump(Session::get('test'));

// TODO create controller

// TODO set views for file

// TODO create ajax handler for clicks and interacts

View::page('index');
