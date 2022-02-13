<?php
session_start();
require_once __DIR__ . '/../modules/index.php';

$number = (int)post('number');
if (!post('value') && !session_get('game_map'))
{
    set_game_map($number);
    open_cells_around_selected_cell($number);
    redirect('/');
}


$value = post('value');
if ($value === 'true')
{
    game_over();
}

open_cells_around_selected_cell($number);

redirect('/');
