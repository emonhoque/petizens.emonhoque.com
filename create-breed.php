<?php
require "includes/header.php";

$username = $_SESSION['username'];

if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
) {
    $editUser = "block";
} else {
    header("location: userlogin");
};
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/croppie.css" />
    <script src="js/croppie.js"></script>
    <title>Add Breed</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Add Breed</h1>
    </div>

    <div class="createpostflex">
        <div class="createpost">
            <form id="form" method="POST" enctype="multipart/form-data" action="includes/createbreed.inc.php">
                <div class="rowCreate">
                    <div class="backgroundrighttab">
                        <strong><label class="fileuploadname" for=" fileSelect">Choose Image To Upload:</label></strong> <br>
                        <img class="px400wide" id="blah" src="#" alt="Upload Image" style="display: none;" /><br>
                        <input class="imgUpload" type="file" name="file_post" id="file_post">
                    </div>
                </div>
                <div class="rowCreate" style="margin-top:10px;">
                    <strong><label class="input-fieldtext">Category:</label></strong>
                    <select class="input-field" id="breed_category" name="breed_category">
                        <?php
                        $sql = "SELECT * FROM article_categories";
                        $res = $conn->query($sql);
                        while ($rows = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rows['category_name']; ?>"><?php echo $rows['category_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="rowCreate">
                    <strong><label class="input-fieldtext">Name:</label></strong>
                    <input class="input-field" type="text" required="true" name="breed_name" placeholder="Name*">
                </div>
                <div class="rowCreate">
                    <strong><label class="input-fieldtext">Color:</label></strong>
                    <input class="input-field" type="text" required="true" name="breed_color" placeholder="Color*">
                </div>
                <div class="rowCreate">
                    <strong><label class="input-fieldtext">Breed Details:</label></strong>
                    <input style="display: none;" readonly="readonly" class="input-field" type="text" id="post_user" name="post_user" placeholder="UserID" value="<?php echo $username; ?>">
                    <textarea maxlength="200" class="input-field2" id="breed_details" name="breed_details" placeholder="Enter some details about the breed in 200 characters or less!"></textarea>
                    <p id="remainback" style="padding:5px; border-radius:10px; background-color:#000; color:#dfdfdf; margin-top:-5px; margin-bottom:5px;"><strong><span id="remain">200</span></strong> characters remaining</p>
                    <p><strong>*PLEASE NOTE:</strong> Breeds will only be displayed<br> once approved by the Admin!<strong>*</strong></p>
                    <br>
                </div>
                <div class="btn-editusersflex">
                    <button class="btn-editusers btn-editusershover" type="submit" value="addbreed_submit" name="addbreed_submit"> Post Breed </button>
                </div>
            </form>
        </div>
    </div>

</main>

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

<script>
    var maxchars = 200;

    $('#breed_details').keyup(function() {
        var tlength = $(this).val().length;
        $(this).val($(this).val().substring(0, maxchars));
        var tlength = $(this).val().length;
        remain = maxchars - parseInt(tlength);
        $('#remain').text(remain);

        if (remain > 30) {
            $('#remainback').css("background-color", "black");
        } else {
            $('#remainback').css("background-color", "red");
        }
        endif;
    });
</script>



<?php
require "includes/footer.php";
?>