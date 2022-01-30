<?php require_once 'view/blocks/head.php'; ?>
<?php require_once 'view/blocks/header.php'; ?>

<body>
    <div class="container-sm">
        <?php 
            $game_map = get_game_map(); 
            $opened_cells = get_open_cells();
            ?>
        <div class="row justify-content-center">
            <div class="cells">
                <?php foreach ($game_map as $key => $value) { 
                    $opened = in_array($key, $opened_cells); ?>
                    <?php if ($opened) { ?>
                        <div class="cell">
                            <button disabled class="cell" style="background-color: green;">
                                <?php echo $value; ?>
                            </button>
                        </div>
                    <?php } else { ?>
                        <form action="/handlers/submit-cell.php" method="post" class="cell">
                            <input type="hidden" name="number" value="<?php echo $key; ?>">
                            <button type="submit"  name="value" value="<?php echo $value === true ? 'true' : $value; ?>" <?php echo $value === true ? 'style="background-color: red"' : ''; ?>>
                                <?php echo ($value === true ? 'mine' : $value); ?> 
                            </button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>