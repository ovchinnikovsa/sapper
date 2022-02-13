<?php
session_start();
require_once __DIR__ . '/../modules/index.php';

if ($_POST['reset'])
{
    reset_game_map();
    clear_opened_cells();
}

redirect('/');
