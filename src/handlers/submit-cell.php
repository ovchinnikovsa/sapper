<?php
session_start();
error_reporting(0);
require_once __DIR__ . '/../modules/index.php';

$number = (int)post('number');
if (!session_get('game_map'))
{
    set_game_map($number);
    session_set('game_over', false);
    open_cells_around_selected_cell($number);
    redirect('/');
}

$action = post('action');
if ($action === 'open')
{
    $value = get_value_by_number_cells($number);
    if ($value === true)
    {
        game_over($number);
        redirect('/');
    }
    open_cells_around_selected_cell($number);
}
else if ($action === 'demine')
{
    $flag_number = is_flag_cell($number);
    if ($flag_number !== false)
    {
        unset($_SESSION['flag_cells'][$flag_number]);
        redirect('/');
    }
    if (count(get_flag_cells()) >= get_difficult()){
        session_set('flag_limit', true);
        redirect('/');
    }
    set_flag_cell($number);
}

if(is_user_win()) {
    session_set('game_winned', true);
}

redirect('/');
