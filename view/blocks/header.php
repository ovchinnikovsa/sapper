<header>
    <div class="container-sm">
        <div class="row justify-content-center">
            <h1 class="header-title">
                Sapper
            </h1>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <div class="row">
            <aside class="col-md-2 col-lg-2 center-block aside">
                <?php if (session_get('game_over') || session_get('game_winned'))
                { ?>
                <form action="/handlers/reset_game.php" method="post">
                    <button type="submit" class="btn btn-dark aside-item position-relative" name="reset" value="1">&#8635 start new
                        game
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
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
                <button type="button" class="btn btn-dark aside-item" data-bs-toggle="modal"
                    data-bs-target="#resetGame">&#8635 start new
                    game</button>
            </aside>
            