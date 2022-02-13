<?php require_once 'view/blocks/head.php'; ?>
<?php require_once 'view/blocks/header.php'; ?>

<body>
    <div class="container-sm">
        <?php
        $game_map = get_existing_game_map();
        if ($game_map)
        {
            $opened_cells = get_open_cells();
        ?>
        <div class="row justify-content-center">
            <div class="cells">
            <?php
            foreach ($game_map as $key => $value)
            {
                if (in_array($key, $opened_cells) && (bool)session_get('game_over'))
                { ?>
                        <div class="cell">
                            <button  class="cell" 
                            <?php
                    if ($value === true)
                    {
                        echo 'style="background-color: red"';
                    }
                    elseif ($value === 0)
                    {
                        echo 'style="background-color: green"';
                    }
        ?>>
                                <?php echo $value; ?>
                            </button>
                        </div>
                    <?php
                }
                else
                { ?>
                        <form action="/handlers/submit-cell.php" method="post" class="cell">
                            <input type="hidden" name="number" value="<?php echo $key; ?>">
                            <button type="submit"  name="value" value="<?php echo $value === true ? 'true' : $value; ?>">
                            </button>
                        </form>
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
            $size = get_map_size();
        ?>
         <div class="row justify-content-center">
            <div class="cells">
                <?php
            for ($i = 0; $i < pow($size, 2); $i++)
            {
        ?>
                    <form action="/handlers/submit-cell.php" method="post" class="cell">
                        <button type="submit"  name="number" value="<?php echo $i; ?>" style="">
                        </button>
                    </form>
                <?php
            }?>
            </div>
         </div>
        <?php
        }?> 
    </div>
</body>