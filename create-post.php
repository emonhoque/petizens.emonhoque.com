<div class="createpostflex">

    <?php
    session_start();
    $username = $_SESSION['username'];
    ?>
    <div class="createpost">
        <form id="form" method="POST" enctype="multipart/form-data" action="includes/createpost.inc.php">
            <div class="rowCreate">
                <div class="backgroundrighttab">
                    <strong><label class="fileuploadname" for=" fileSelect">Choose Image To Upload:</label></strong> <br>
                    <img class="px400wide" id="blah" src="#" alt="Upload Image" style="display: none;" /><br>
                    <input class="imgUpload" type="file" name="file_post" id="file_post">
                </div>
            </div>
            <div class="rowCreate">
                <strong><label class="input-fieldtext">Caption:</label></strong>
                <input style="display: none;" readonly="readonly" class="input-field" type="text" id="post_user" name="post_user" placeholder="UserID" value="<?php echo $username; ?>">
                <textarea class="input-field2" id="user_desc" name="post_caption" placeholder="Enter Your Caption!"></textarea>
                <p style="color:black;">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                        <"br">
                    </span> without the quotes to go to new a line.</p>
                <p id="blah2" style="display:none; color:black;">*Please ensure everything is correct because<br> the picture can't be edited once uploaded, only deleted.*</p><br>
            </div>
            <div class="btn-editusersflex">
                <button class="btn-editusers btn-editusershover" type="submit" value="createpost_submit" name="createpost_submit"> Post Image </button>
            </div>
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