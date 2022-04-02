<div class="modal fade" tabindex="-1" id="resetGame" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetGame">Are you shure about that?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="/handlers/reset_game.php" method="post">
                    <button type="submit" class="btn btn-dark aside-item" name="reset" value="1">yes</button>
                </form>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">no</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="resetGameDif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetGameDifTitle">Are you shure about that?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="$('#resetGameForm').submit();">yes</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">no</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="resetGame123" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetGame123">Are you shure about that?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="/handlers/reset_game.php" method="post">
                    <button type="submit" class="btn btn-dark aside-item" name="reset" value="1">yes</button>
                </form>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">no</button>
            </div>
        </div>
    </div>
</div>

<?php if (session_get('game_winned'))
{ ?>
<div class="modal fade" tabindex="-1" id="congratsModal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="congratsModal">&#127880;Congrats, u won&#127880;</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cringe &#129311;</button>
            </div>
        </div>
    </div>
</div>
<script>
new bootstrap.Modal(document.getElementById('congratsModal')).toggle()
</script>
<?php
}?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h1 class="header-title" id="mobileMenuLabel">Sapper</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php if (session_get('game_over') || session_get('game_winned'))
                { ?>
        <form action="/handlers/reset_game.php" method="post">
            <button type="submit" class="btn-lg btn-dark aside-item position-relative" name="reset" value="1">&#8635
                start
                new
                game
                <span
                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden"></span>
                </span>
            </button>
        </form>
        <?php
                }
                else
                { ?>
        <button type="button" class="btn-lg btn-dark aside-item" data-bs-toggle="modal"
            data-bs-target="#resetGame">&#8635
            start new
            game</button>
        <?php
                }?>
        <button class="btn-lg btn-dark aside-item" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Select difficult
        </button>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="btn-group-vertical" role="group" aria-label="Basic radio toggle button group">
                    <?php $i = 1;
                     $difficult = get_difficult();
                    foreach (get_difficult_presets() as $key => $value) { ?>
                    <input type="radio" class="btn-check" name="<?php echo $value['title']; ?>" id="br<?php echo $i; ?>"
                        autocomplete="off" <?php echo $difficult === $key ? 'checked' : ''; ?>>
                    <label class="btn btn-outline-dark diff-selector difficult-js" data-value="<?php echo $key; ?>"
                        data-submit="<?php echo session_get('game_over') || session_get('game_winned'); ?>"
                        for="br<?php echo $i++; ?>"><?php echo $value['title']; ?></label>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
