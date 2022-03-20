<?php
session_start();
require_once __DIR__ . '/../modules/index.php';

if (post('reset'))
{
    $_SESSION = [];
}

if (post('difficult')) {
    
}

redirect('/');
