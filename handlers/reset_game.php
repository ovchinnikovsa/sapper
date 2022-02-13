<?php
session_start();
require_once __DIR__ . '/../modules/index.php';

if ($_POST['reset'])
{
    session_clear_value('game_map');
    session_clear_value('open_cells');
}

redirect('/');
