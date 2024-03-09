<?php require_once 'view/blocks/head.php'; ?>
<?php require_once 'view/blocks/header.php'; ?>
<main class="col-md-8 col-lg-8">
    <?php
    $game_map = get_existing_game_map();
    $size = get_map_size();
    $style_size = round(100 / $size, 2) - 0.1;
    ?>

    <style>
    .cells div {
        width: <?php echo $style_size;
        ?>%;
        height: <?php echo $style_size;
        ?>%;
    }
    </style>

    <?php
    if ($game_map)
    {
        $opened_cells = get_open_cells();
        $flag_cells = get_flag_cells();
    ?>



    <div class="row justify-content-center">
        <div class="cells">
            <?php
        foreach ($game_map as $key => $value)
        {
            if (session_get('game_over') || session_get('game_winned'))
            {
    ?>
            <div class="cell-opened">
                <?php if ($value === true)
                { 
                    if (in_array($key, $flag_cells)) {
                    ?>
                <button class="mine">
                &#128681;
                </button>
                <?php } else { ?>
                <button class="mine<?php echo $key === session_get('game_over') ? '-exploded' : ''; ?>">
                    <?php echo $key === session_get('game_over') ? '&#128165;' : '&#128163;'; ?>
                </button>
                <?php
                }
                }
                else
                { ?>
                <button class="mines-around-<?php echo $value; ?>">
                    <?php echo $value; ?>
                </button>
                <?php
                }?>
            </div>
            <?php
            }
            else if (in_array($key, $opened_cells))
            { ?>
            <div class="cell-opened">
                <button class="mines-around-<?php echo $value; ?>">
                    <?php echo $value; ?>
                </button>
            </div>
            <?php
            }
            else if (in_array($key, $flag_cells))
            { ?>
            <div class="flag-cell" data-number="<?php echo $key; ?>">
                <button class="flag">
                    &#128681;
                </button>
            </div>
            <?php
            }
            else
            { ?>
            <div class="cell" data-number="<?php echo $key; ?>">
                <button type="submit">
                </button>
            </div>
            <?php
            }?>
            <?php
        }?>
        </div>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="row justify-content-center">
        <div class="cells">
            <?php
        for ($i = 1; $i <= pow($size, 2); $i++)
        {
    ?>
            <div class="cell" data-number="<?php echo $i; ?>">
                <button type="submit"></button>
            </div>
            <?php
        }?>
        </div>
    </div>
    <?php
    }?>
</main>