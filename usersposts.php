<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

header('Access-Control-Allow-Origin: https://petizens.xyz/');

$username = $_GET['user'];

if (empty($username)) {
    header("Location: /error-users?not-found");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM posts WHERE post_user='$username';");
$rowed = mysqli_num_rows($result);

$sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['username'];
}

if (empty($Validation)) {
    header("location: /error-users?not-found");
    exit;
}

$postCheck = mysqli_query($conn, "SELECT * FROM posts WHERE post_user='$username';");
$hidepostrow = mysqli_num_rows($postCheck);

if ($hidepostrow < 1) {
    $Hidepostp = "flex";
    $minvh0 = "70vh";
} else {
    $Hidepostp = "none";
    $minvh0 = "0vh";
}

if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
) {
    $createUser = "inline-block";
    $createUser2 = "flex";
    $editUser = "block";
} else {
    $createUser = "none";
    $createUser2 = "none !important";
    $editUser = "none";
}

ob_end_flush();
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style-mfp.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script defer src="js/mylightbox.js"></script>
    <?php
    $sql = "SELECT * FROM users WHERE username='$username';";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $FName = $rows['user_fname'];
        $LName = $rows['user_lname'];
    ?>
        <title><?php echo $FName; ?> <?php echo $LName; ?>'s Posts</title>
    <?php
    }
    ?>
</head>

<main class="main-content">
    <br>
    <div class="userpagepostsflex">
        <div class="userpageposts">
            <table class="userpagepoststable">
                <thead>
                    <?php
                    $sql = "SELECT * FROM users WHERE username='$username';";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $FName = $rows['user_fname'];
                        $LName = $rows['user_lname'];
                        $Username = $rows['username'];
                        $Image = $rows['user_img'];
                        $Desc = $rows['user_desc'];
                    ?>
                        <div class="userpostbioflex">
                            <div class="userpostbio" style="display: flex; flex-direction:row;">
                                <div class="userpostbioleft">
                                    <img class="userpostedimge" src="img/users/<?php echo $Image; ?>" alt="userimg">
                                </div>
                                <div class="userpostbioright">
                                    <h3 style="text-align:left"><?php echo $FName ?> <?php echo $LName ?></h3>
                                    <h4>@<?php echo $Username ?></h4>
                                    <h5><?php echo $rowed ?> Posts </h5>
                                    <div class="biopbottommargin">
                                        <p><?php echo $Desc ?></p>
                                    </div>
                                </div>
                                <div class="usersettingsbiopost">
                                    <a class="editbuttonnostyle ajaxpopupcreateposts" href="create" style="display:<?php echo $createUser ?>;">
                                        <button type="submit" class="createpostbutton2" style="display:<?php echo $createUser ?>;"><i class="fas fa-camera"></i></button>
                                    </a>
                                    <a class="editbuttonnostyle" href="pawchat">
                                        <button type="submit" class="createpostbutton2"><i class="fas fa-envelope"></i></button>
                                    </a>
                                    <a class="editbuttonnostyle" href="edit-details" style="display:<?php echo $createUser ?>;">
                                        <button type="submit" class="createpostbutton2" style="display:<?php echo $createUser ?>;"><i class="fas fa-cog"></i></button>
                                    </a>
                                </div>
                            </div>
                            <div class="biopbottommarginmobile">
                                <p><?php echo $Desc ?></p>
                            </div>
                            <div class="usersettingsbiopostmobile">
                                <a class="editbuttonnostylemobile ajaxpopupcreateposts" href="create" style="display:<?php echo $createUser ?>;">
                                    <button type="submit" class="createpostbutton2mobile" style="display:<?php echo $createUser ?>;"><i class="fas fa-camera"></i></button>
                                </a>
                                <a class="editbuttonnostylemobile" href="pawchat">
                                    <button type="submit" class="createpostbutton2mobile"><i class=" fas fa-envelope"></i></button>
                                </a>
                                <a class="editbuttonnostylemobile" href="edit-details" style="display:<?php echo $createUser ?>;">
                                    <button type="submit" class="createpostbutton2mobile" style="display:<?php echo $createUser ?>;"><i class="fas fa-cog"></i></button>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </thead>
                <tbody>
                    <div class="userdidntpost" style="display:<?php echo $Hidepostp ?>;">
                        <p> This user hasn't posted yet! </p>
                    </div>
                    <div class="upgallery">
                        <?php
                        $sql = "SELECT * FROM posts WHERE post_user='$username' AND post_approved='1' ORDER BY post_id DESC;";
                        $res = $conn->query($sql);
                        while ($rows = $res->fetch_assoc()) {
                            $Id = $rows['post_id'];
                            $Img = $rows['post_img'];
                            $Caption = $rows['post_caption'];
                        ?>
                            <div class="upgallery-item">
                                <a class="upanodeco simple-ajax-popup" href="imgpost/<?php echo $Id ?>">
                                    <img src="img/posts/<?php echo $Img ?>" class="upgallery-image" href="#small-dialog" alt="Post-<?php echo $Id ?>">
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('.simple-ajax-popup').magnificPopup({
            type: 'ajax',
            closeOnContentClick: false,
            modal: false
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.ajaxpopupcreateposts').magnificPopup({
            type: 'ajax'
        });
    });
</script>


<?php
require "includes/footer.php";
?>