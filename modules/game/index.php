<?php

function generate_game_map(int $difficult = 40): array
{
    $size = get_map_size();
    $sqr_size = pow($size, 2);
    $game_map = array_fill(0, $sqr_size, 0);
    $sqr_size--;

    $mines = [];
    for ($i = 0; $i < $difficult; $i++)
    {
        $random_mine = rand(0, $sqr_size);
        if (in_array($random_mine, $mines))
        {
            $i--;
            continue;
        }
        $mines[] = $random_mine;
        $game_map[$random_mine] = true;
        $game_map = increase_value_around_mine($random_mine, $game_map, $size);
    }

    return $game_map;
}

function set_game_map($first_touch = false): void
{
    $game_map = [];
    if ($first_touch)
    {
        $cell_value = false;
        while ($cell_value !== 0)
        {
            $game_map = generate_game_map();
            $cell_value = $game_map[$first_touch];
        }
    }
    else
    {
        $game_map = generate_game_map();
    }
    session_set('game_map', $game_map);
}

function get_game_map(): array
{
    if (!session_get('game_map'))
    {
        set_game_map();
    }
    return session_get('game_map');
}

function get_existing_game_map(): array
{
    $game_map = session_get('game_map');
    if ($game_map)
    {
        return $game_map;
    }
    return [];
}

function set_open_cell($cell_number): void
{
    $_SESSION['open_cells'][] = $cell_number;
}

function get_open_cells(): array
{
    return session_get('open_cells') ?? [];
}

function set_map_size(int $size = 16): void
{
    session_set('map_size', $size);
}

function get_map_size(): int
{
    if (!session_get('map_size'))
    {
        set_map_size();
    }
    return session_get('map_size');
}

function increase_value_from_game_map(int $cell_number, array $game_map): array
{
    $size = get_map_size();
    $sqr_size = pow($size, 2) - 1;

    if ($cell_number < 0 || $game_map[$cell_number] === true || $cell_number > $sqr_size)
    {
        return $game_map;
    }
    $game_map[$cell_number] = $game_map[$cell_number] + 1;

    return $game_map;
}

function get_cells_around(int $selected_cell): array
{
    $size = get_map_size();
    $cells_around = [];
    for ($i = -1; $i <= 1; $i++)
    {
        $j = $selected_cell % $size === 0 ? 0 : -1;
        $j_limit = ($selected_cell + 1) % $size === 0 ? 0 : 1;

        for ($j; $j <= $j_limit; $j++)
        {
            $cells_around[] = $selected_cell + $size * $i + $j;
        }
    }
    return $cells_around;
}

function increase_value_around_mine(int $mine_cell, array $game_map): array
{
    $size = get_map_size();
    foreach (get_cells_around($mine_cell, $size) as $item)
    {
        $game_map = increase_value_from_game_map($item, $game_map, $size);
    }

    return $game_map;
}

function open_cells_around_selected_cell($selected_cell): bool
{
    $size = get_map_size();
    $game_map = get_existing_game_map();
    $opened_cells = get_open_cells();
    $value = $game_map[$selected_cell];
    if ($value > 0)
    {
        set_open_cell($selected_cell);
        return true;
    }
    $checking_cells[] = $selected_cell;
    $checked_cells = [];

    while ($checking_cells)
    {
        foreach ($checking_cells as $checking_cell)
        {
            foreach (get_cells_around($checking_cell, $size) as $cell)
            {
                if (in_array($cell, $opened_cells) || in_array($cell, $checked_cells))
                {
                    continue;
                }

                $value = $game_map[$cell];
                if ($value === 'true')
                {
                    continue;
                }

                if ($value === 0)
                {
                    $checking_cells[] = $cell;
                }

                set_open_cell($cell);
            }
            $checked_cells[] = $checking_cell;
        }
        $checking_cells = array_diff($checking_cells, $checked_cells);
    }
    return true;
}

function game_over(): void
{
    session_set('game_over', true);
}
