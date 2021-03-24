<?php
require "includes/header.php";

$username = $_SESSION['username'];

if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
) {
    $editUser = "block";
} else {
    header("location: error-edit");
};

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style-test.css" />
    <?php
    $sql = "SELECT * FROM users WHERE username='$username';";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $FName = $rows['user_fname'];
        $LName = $rows['user_lname'];
    ?>
        <title>Edit <?php echo $FName; ?>'s Profile</title>
    <?php
    }
    ?>
</head>

<main class="main-content">

    <div class="animaldiv">
        <?php
        $sql = "SELECT * FROM users WHERE username='$username';";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $FName = $rows['user_fname'];
            $LName = $rows['user_lname'];
        ?>
            <h1>Edit <?php echo $FName; ?>'s Profile</h1>
        <?php
        }
        ?>
    </div>

    <div id="main-form">
        <?php
        $sql = "SELECT * FROM users WHERE username='$username';";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $ID = $rows['user_id'];
            $Username2 = $rows['username'];
            $FName = $rows['user_fname'];
            $LName = $rows['user_lname'];
            $Email = $rows['user_email'];
            $Phone = $rows['user_phone'];
            $Password = $rows['user_pass'];
            $Image = $rows['user_img'];
            $Desc = $rows['user_desc'];
        ?>
            <form id="survey-form" method="POST" enctype="multipart/form-data" action="includes/edituserimg.inc">
                <div class="rowTab">
                    <div class="editlabels">
                        <img class="usereditimg" src="img/users/<?php echo $Image; ?>" alt="userimg">
                        <input style="display: none;" class="input-field" type="text" id="user_img" name="user_img" placeholder="UserImg" value="<?php echo $Image; ?>"><br>
                    </div>
                    <div class="rightTab rightTabColumn">
                        <div class="backgroundrighttab">
                            <label class="fileuploadname" for=" fileSelect">Change Image to: <img class="px100wide" id="blah" src="#" alt="Upload Image" style="display: none;" /></label> <br>
                            <p id="blah2" style="font-size: 10px; display:none; color:#dfdfdf;">*Please ensure the image is square for a better experience!*</p>
                            <input class=" imgUpload" type="file" name="file" id="file"><br><br>
                            <input style="display: none;" readonly="readonly" class="input-field" type="text" id="user_id2" name="user_id2" placeholder="UserID" value="<?php echo $ID; ?>">
                            <input style="display: none;" readonly="readonly" class="input-field" type="text" id="username2" name="username2" placeholder="Username" value="<?php echo $Username2; ?>">
                        </div><br>
                        <button class="btn-editusers btn-editusershover" type="submit" value="img_submit" name="img_submit"> Upload Image </button><br>
                    </div>
                </div>
            </form>
            <hr class="addingagapineditpage">
            <form id="survey-form" method="POST" action="includes/edituserdetails.inc">
                <div class="rowTab">
                    <div class="editlabels floatleft editlabelmargintop">
                        <strong><label class="input-fieldtext">First Name:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <input class="input-field" type="text" id="user_fname" name="user_fname" placeholder="First Name" value="<?php echo $FName; ?>"><br>
                    </div>
                </div>
                <div class="rowTab">
                    <div class="editlabels floatleft">
                        <strong><label class="input-fieldtext">Last Name:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <input class="input-field" type="text" id="user_lname" name="user_lname" placeholder="Last Name" value="<?php echo $LName; ?>"><br>
                    </div>
                </div>
                <div class="rowTab">
                    <div class="editlabels floatleft">
                        <strong><label class="input-fieldtext">Username:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <input readonly="readonly" class="input-field" type="text" id="username" name="username" placeholder="Username" value="<?php echo $Username2; ?>"><br>
                    </div>
                </div>
                <div class="rowTab">
                    <div class="editlabels floatleft">
                        <strong><label class="input-fieldtext">Email:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <input class="input-field" type="text" id="user_email" name="user_email" placeholder="Email" value="<?php echo $Email; ?>"><br>
                    </div>
                </div>
                <div class="rowTab">
                    <div class="editlabels floatleft">
                        <strong><label class="input-fieldtext">Phone Number:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <input class="input-field" type="text" id="user_phone" name="user_phone" placeholder="Phone Number" value="<?php echo $Phone; ?>"><br>
                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="user_id" name="user_id" placeholder="UserID" value="<?php echo $ID; ?>"><br>
                    </div>
                </div>
                <div class="rowTab">
                    <div class="editlabels floatleft">
                        <strong><label class="input-fieldtext">Bio:</label></strong><br><br>
                    </div>
                    <div class="rightTab floatright">
                        <textarea class="input-field2" id="user_desc" name="user_desc" placeholder="Write your Bio in 200 Words*"><?php echo $Desc; ?></textarea><br>
                    </div>
                </div>
                <p style="color:black; text-align:center; margin-bottom:5px;">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                        <"br">
                    </span> without the quotes to go to new a line.</p>
                <div class="btn-editusersflex">
                    <button class="btn-editusers btn-editusershover" type="submit" value="user_submit" name="user_submit"> Submit Changes </button>
                </div>
            </form>
        <?php
        }
        ?>
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

    $("#file").change(function() {
        readURL(this);
    });
</script>

<?php
require "includes/footer.php";
?>