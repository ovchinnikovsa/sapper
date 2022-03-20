<aside class="col-md-2 col-lg-2 aside">
    <div class="flag-count">
        <?php
        $flags_count = count(get_flag_cells());
        $flag_limit = get_difficult();

        echo '&#128681; ' . $flags_count . '/' . $flag_limit;
        ?>
    </div>

    <form action="/handlers/submit-cell.php" method="post" id="submit-cell">
        <input type="hidden" name="number">
        <div class="btn-group aside-item" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="action" value="open" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="btnradio1">&#9935; open</label>

            <input type="radio" class="btn-check" name="action" value="demine" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-dark" for="btnradio2">&#128681; demine</label>
        </div>
    </form>
    <div>
    </div>
</aside>
</div>
</div>
</div>
</body>

<script src="/view/assets/js/bootstrap.min.js"></script>
<script src="/view/assets/js/jquery-3.6.0.min.js"></script>
<script src="/view/assets/js/submit_cell.js"></script>

<?php require_once 'view/blocks/modals.php'; ?>

</html>