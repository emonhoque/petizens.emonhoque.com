<div class="communitycppostflex">
    <?php
    session_start();
    $username = $_SESSION['username'];
    ?>
    <div class="communitycpost">
        <form id="form" method="POST" enctype="multipart/form-data" action="includes/createcpost.inc.php">
            <div class="rowCreate">
                <div class="backgroundrighttab">
                    <strong><label class="fileuploadname" for=" fileSelect">Choose Image To Upload:</label></strong> <br>
                    <img class="px400wide" id="blah" src="#" alt="Upload Image" style="display: none;" /><br>
                    <input class="imgUpload" type="file" name="file_post" id="file_post">
                </div>
            </div>
            <textarea class="cpost_create" required="true" id="cpost_caption" name="cpost_caption" placeholder="Say What's on Your Mind!"></textarea><br>
            <input style="display: none;" required="true" readonly="readonly" class="input-field" type="text" id="cpost_user" name="cpost_user" placeholder="UserID" value="<?php echo $username; ?>">
            <button class="cpost_btn2 cpost_btnhover" type="submit" value="create_imgcpost" name="create_imgcpost"> Create Post </button>
            <p style="color:black; margin-top:10px; font-size:small">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                    <"br">
                </span> without the quotes to go to new a line.</p>
        </form>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    document.getElementById("blah").style.display = "inline";
                    document.getElementById("blah2").style.display = "block";
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file_post").change(function() {
            readURL(this);
        });
    </script>
</div>