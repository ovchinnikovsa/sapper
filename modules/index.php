<?php

function dd($value): void
{
    var_dump($value);
    die();
}

function set_game_map(int $size = 16, int $difficult = 30): array
{
    $sqr_size = pow($size, 2);
    $game_map = array_fill(0, $sqr_size, 0);
    $sqr_size--; 

    $mines = [];
    for ($i = 0; $i < $difficult; $i++) {
        $random_mine = rand(0, $sqr_size);
        if (in_array($random_mine, $mines)) {
            $i--;
            continue;
        }
        $mines[] = $random_mine;
        $game_map[$random_mine] = true;
        $game_map = increase_value_around_mine($random_mine, $game_map, $size);
    }

    return $game_map;
}

function get_game_map(): array
{
    if (!isset($_SESSION['game_map'])) {
        $_SESSION['game_map'] = set_game_map();
    }

    return $_SESSION['game_map'];
}

function get_existing_game_map(): array
{
    if ($_SESSION['game_map']) {
        return $_SESSION['game_map'];
    }
    die('Can`t get game map!');
}

function set_open_cell($cell_number): void
{
    $_SESSION['open_cells'][] = $cell_number;
}

function get_open_cells(): array
{
    return $_SESSION['open_cells'] ?? [];
}

function increase_value_from_game_map(int $cell_number, array $game_map, int $size): array
{
    $sqr_size = pow($size, 2) - 1;

    if ($cell_number < 0 || $game_map[$cell_number] === true || $cell_number > $sqr_size){
        return $game_map;
    }
    $game_map[$cell_number] = $game_map[$cell_number] + 1;

    return $game_map;
}

function increase_value_around_mine(int $mine_cell, array $game_map, int $size): array
{
    for ($i = -1; $i <= 1; $i++) {
        $j = $mine_cell % $size === 0 ? 0 : -1;
        $j_limit = ($mine_cell + 1) % $size === 0 ? 0 : 1;

        for ($j; $j <= $j_limit; $j++) {
            $game_map = increase_value_from_game_map($mine_cell + $size * $i + $j, $game_map, $size);
        }
    }

    return $game_map;
}

function open_cells_around_selected_cell($cell, $size = 16): array
{
    $game_map = get_existing_game_map();
    $opened_cells = get_open_cells();

    for ($i = -1; $i <= 1; $i++) {
        $j = $mine_cell % $size === 0 ? 0 : -1;
        $j_limit = ($mine_cell + 1) % $size === 0 ? 0 : 1;

        for ($j; $j <= $j_limit; $j++) {
            $game_map = increase_value_from_game_map($mine_cell + $size * $i + $j, $game_map, $size);
        }
    }

    return $game_map;
}
