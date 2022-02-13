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
// open_cells_around_selected_cell($number);
$value = (int)$_POST['value'];
open_cells_around_selected_cell($number);

redirect('/');
