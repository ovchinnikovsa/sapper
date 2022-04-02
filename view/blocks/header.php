<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <button class="menu-button position-relative" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                    <img src="/view/assets/images/menu_open.png" alt="open menu">
                    <span
                        class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden"></span>
                    </span>
                </button>
            </div>
            <h1 class="header-title">
                Sapper
            </h1>
            <div></div>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <div class="row">
            <aside class="col-md-2 col-lg-2 center-block aside">
                <div class="left-game-menu">

                    <?php if (is_game_ended())
                { ?>
                    <form action="/handlers/reset_game.php" method="post">
                        <button type="submit" class="btn btn-dark aside-item position-relative" name="reset"
                            value="1">&#8635 start new
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

                    <button type="button" class="btn btn-dark aside-item" data-bs-toggle="modal"
                        data-bs-target="#resetGame">&#8635 start new
                        game</button>

                    <?php
                }?>
                    <button class="btn btn-dark aside-item" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Select difficult
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="btn-group-vertical" role="group" aria-label="Basic">
                                <?php 
                                $i = 1;
                                $difficult = get_difficult();
                                foreach (get_difficult_presets() as $key => $value) { ?>
                                <input type="radio" class="btn-check" name="<?php echo $key; ?>" id="b<?php echo $i; ?>"
                                    autocomplete="off" <?php echo $difficult === $key ? 'checked' : ''; ?>>
                                <label class="btn btn-outline-dark difficult-js" data-value="<?php echo $key; ?>"
                                    data-submit="<?php echo is_game_ended() ? 'true' : 'false'; ?>"
                                    for="b<?php echo $i++; ?>"><?php echo $value['title']; ?></label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>