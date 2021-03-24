<div class="communitycppostflex">
    <?php
    session_start();
    $username = $_SESSION['username'];
    ?>
    <div class="communitycpost">
        <form id="form" method="POST" action="includes/createcpost.inc.php">
            <textarea class="cpost_create" required="true" id="cpost_caption" name="cpost_caption" placeholder="Say What's on Your Mind!"></textarea><br>
            <input style="display: none;" required="true" readonly="readonly" class="input-field" type="text" id="cpost_user" name="cpost_user" placeholder="UserID" value="<?php echo $username; ?>">
            <button class="cpost_btn2 cpost_btnhover" type="submit" value="create_txtcpost" name="create_txtcpost"> Create Post </button>
            <p style="color:black; margin-top:10px; font-size:small">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                    <"br">
                </span> without the quotes to go to new a line.</p>
        </form>
    </div>
</div>