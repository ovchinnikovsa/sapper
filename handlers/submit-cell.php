<?php
session_start();
require_once __DIR__ . '/../modules/index.php';

if (!isset($_POST['number']) && !isset($_POST['value'])) {
    die('Sumbit error!');
}

if ($_POST['value'] === 'true') {
    die('game over');
}

$number = (int)$_POST['number'];
set_open_cell($number);
$value = (int)$_POST['value'];

get_game_map();

var_dump($_POST);
die();
