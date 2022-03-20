<div class="modal fade" tabindex="-1" id="resetGame" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you shure about that?</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">&#127880;Congrats, u won&#127880;</h5>
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