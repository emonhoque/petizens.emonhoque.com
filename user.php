<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

$username = $_GET['user'];

if (empty($username)) {
    header("Location: /error-users?not-found");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM articles WHERE art_admin='$username';");
$row = mysqli_num_rows($result);

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

$dive = mysqli_query($conn, "SELECT * FROM articles WHERE art_admin='$username';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "none";
}

$postCheck = mysqli_query($conn, "SELECT * FROM posts WHERE post_user='$username';");
$hidepostrow = mysqli_num_rows($postCheck);

if ($hidepostrow < 1) {
    $Hidepostp = "flex";
    $Hidepostbutton = "none";
} else {
    $Hidepostp = "none";
    $Hidepostbutton = "block";
}


if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
) {
    $editUser = "block";
    $editUser2 = "block";
    $editUser3 = "none";
    $editUser4 = "none !important";
    $createUser = "inline-block";
} else {
    $editUser = "none";
    $editUser2 = "none !important";
    $editUser3 = "block";
    $editUser4 = "block";
    $createUser = "none";
}

ob_end_flush();
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script defer src="js/mylightbox.js"></script>
    <link rel="stylesheet" href="style/style-mfp.css" />
    <?php
    $sql = "SELECT * FROM users WHERE username='$username';";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $FName = $rows['user_fname'];
        $LName = $rows['user_lname'];
    ?>
        <title><?php echo $FName; ?> <?php echo $LName; ?>'s Profile</title>
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
            <h1><?php echo $FName; ?> <?php echo $LName; ?>'s Profile</h1>
        <?php
        }
        ?>
    </div>

    <div class="userdetailsflex">
        <div class="userdetails">
            <table class="userdetailstable">
                <?php
                $sql = "SELECT * FROM users WHERE username='$username';";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $ID = $rows['user_id'];
                    $Username = $rows['username'];
                    $FName = $rows['user_fname'];
                    $LName = $rows['user_lname'];
                    $Email = $rows['user_email'];
                    $Phone = $rows['user_phone'];
                    $Image = $rows['user_img'];
                    $Desc = $rows['user_desc'];
                    $Join = $rows['user_join'];
                    $arr = array(1 => '<span class="verifiedspan">_<img class="verified" src="img/verified.png" alt="userimg"><span class="tooltiptext"> This User is an Admin</span></span>', 0 => ' ');
                    $Admin = $arr[$rows['is_admin']];
                    $arr2 = array(1 => '<span class="verifiedspan">_<img class="verified" src="img/emailverified.png" alt="userimg"><span class="tooltiptext"> This Users Email is Verified </span></span>', 0 => ' ');
                    $Verified = $arr2[$rows['user_verified']];
                    $newdate = date("F j, Y", strtotime($Join));
                    $newdate = $newdate;
                ?>
                    <tbody>
                        <tr>
                            <td style="width: 50%;" class="tablenone">
                                <img class="userdetailsimg" src="img/users/<?php echo $Image; ?>" alt="userimg">
                            </td>
                            <td style="width: 50%;" class="userdetailsmargin">
                                <img class="userdetailsimg2" src="img/users/<?php echo $Image; ?>" alt="userimg">
                                <p><strong>Full Name:</strong></p>
                                <p><?php echo $FName; ?> <?php echo $LName; ?></p><br>
                                <p><strong>Username:</strong></p>
                                <p class="userdetailsusername"><?php echo $Username; ?><?php echo $Admin; ?></p><br>
                                <p><strong>Email:</strong></p>
                                <p class="userdetailsusername"><?php echo $Email; ?><?php echo $Verified; ?></p><br>
                                <p><strong>Bio:</strong></p>
                                <p><?php echo $Desc; ?></p><br>
                                <p><strong>Number of Posts:</strong></p>
                                <p><?php echo $rowed; ?></p><br>
                                <a class="editbuttonnostyle" href="pawchat">
                                    <button type="submit" class="editbuttonusers editbuttonusershover" style="display:<?php echo $editUser3 ?>"> Message <i class="fa fa-envelope" style="font-size:20px"></i></button>
                                </a>
                                <a class="editbuttonnostyle" href="edit-details">
                                    <button type="submit" class="editbuttonusers editbuttonusershover" style="display:<?php echo $editUser ?>">Edit Details <i class="fa fa-edit" style="font-size:20px"></i></button>
                                </a>
                                <p><strong>Member Since:</strong></p>
                                <p><?php echo $newdate; ?></p>
                                <a class="editbuttonnostyle" href="pawchat">
                                    <button type="submit" class="editbuttonusersmobile editbuttonusershover" style="display:<?php echo $editUser4 ?>"> Message <i class="fa fa-envelope" style="font-size:20px"></i></button>
                                </a>
                                <a class="editbuttonnostyle" href="edit-details">
                                    <button type="submit" class="editbuttonusersmobile editbuttonusershover" style="display:<?php echo $editUser2 ?>">Edit Details <i class="fa fa-edit" style="font-size:20px"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

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
                    ?>
                        <div class="noofarts">
                            <h2><?php echo $FName; ?>'s Recent Posts</h2>
                            <a class="editbuttonnostyle ajaxpopupcreateposts" href="create">
                                <button type="submit" class="createpostbutton editbuttonusershover" style="display:<?php echo $createUser ?>;"> Create New Post <i class="fas fa-camera" style="font-size:20px"></i></button>
                            </a>
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
                        $sql = "SELECT * FROM posts WHERE post_user='$username' AND post_approved='1' ORDER BY post_id DESC LIMIT 6;";
                        $res = $conn->query($sql);
                        while ($rows = $res->fetch_assoc()) {
                            $Img = $rows['post_img'];
                        ?>
                            <div class="upgallery-item">
                                <a class="upanodeco" href="user/<?php echo $username; ?>/posts">
                                    <img src="img/posts/<?php echo $Img ?>?w=300&h=300&fit=crop" class="upgallery-image" alt="A Post">
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </tbody>
            </table>
            <p class="viewalluserstable" style="display:<?php echo $Hidepostbutton ?>;">
                <a href="user/<?php echo $username; ?>/posts"><span>View All Posts</span></a>
            </p>
        </div>
    </div>

    <br>
    <div class="userpostflex" style="display:<?php echo $HideDiv; ?>">
        <div class=" userposts">
            <table class="userpoststable">
                <thead>
                    <?php
                    $sql = "SELECT * FROM users WHERE username='$username';";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $FName = $rows['user_fname'];
                    ?>
                        <h2 class="userposth1">Recent Articles by <?php echo $FName; ?></h2>
                        <hr class="userposthr">
                    <?php
                    }
                    ?>
                </thead>
                <?php
                $sql = "SELECT * FROM articles WHERE art_admin='$username' ORDER BY art_id DESC LIMIT 3";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $ArtID = $rows['art_id'];
                    $ArtAdmin = $rows['art_admin'];
                    $ArtCat = ucwords($rows['art_category']);
                    $ArtTitle = $rows['art_title'];
                    $ArtDate = $rows['art_date'];
                    $ArtImg = $rows['art_img'];
                    $ArtBody = $rows['art_body'];
                    $ArtTags = $rows['art_tags'];
                    $dashedTitle = $rows['art_dash'];
                    $words = explode(" ", $ArtBody);
                    $first20words = join(" ", array_slice($words, 0, 30));
                ?>
                    <tbody>
                        <tr>
                            <td style="width: 40%;" class="tablenone">
                                <img class="userpostimg" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                            </td>
                            <td style="width: 60%;">
                                <img class="userpostimg2" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                                <h3 class="userposth3"><?php echo $ArtTitle; ?> </h3>
                                <p class="userpostcategoryp"><span style="font-weight: bold;">Category: </span><?php echo $ArtCat; ?></p>
                                <div class="userpostbodyp"><?php echo $first20words; ?>...</div>
                                <p class="userpostreadmore">
                                    <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>"><span>Read More</span></a>
                                </p>
                                <hr class="userposthr">
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
            <p class="viewalluserstable">
                <a href="user/<?php echo $username; ?>/articles"><span>View All Articles</span></a>
            </p>
        </div>
    </div>
</main>

<script>
    $(function() {

        $('.box').each(function(k, v) {
            var box = $(this).dialog({
                modal: true,
                resizable: false,
                autoOpen: false
            });
            $(this).parent().find('.ui-dialog-titlebar-close').hide();

            $("#elem" + k).mouseover(function() {
                box.dialog("open");
            }).mouseout(function() {
                box.dialog("close");
            });
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