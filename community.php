<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

if (
    isset($_SESSION['username']) && !empty($_SESSION['username'])
) {
    $sessionUser = $_SESSION['username'];
    $wrapper = "grid";
    $commentbox = "block";
} else {
    $wrapper = "none";
    $commentbox = "none";
}

if (isset($_GET['usrid'])) {
    $usrid = $_GET['usrid'];
    if ($usrid == 'all') {
        $selectusr = "SELECT * FROM cposts WHERE cpost_approved='1' ORDER BY cpost_id DESC;";
    } elseif ($usrid = $usrid) {
        $selectusr = "SELECT * FROM cposts WHERE cpost_approved='1' AND cpost_user='$usrid' ORDER BY cpost_id DESC;";
    } else {
        $selectusr = "SELECT * FROM cposts WHERE cpost_approved='1' ORDER BY cpost_id DESC;";
    }
} else {
    $selectusr = "SELECT * FROM cposts WHERE cpost_approved='1' ORDER BY cpost_id DESC;";
}

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <script defer src="js/mylightbox.js"></script>
    <link rel="stylesheet" href="style/style-mfp.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Community</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Community</h1>
    </div>


    <div class="wrapperlocations wrapperlocmorewidth" style="display:<?php echo $wrapper; ?>;">
        <a class="editbuttonnostyle simple-ajax-popup" href="createtxtcpost">
            <div class="wrapperlocationsdiv wrapperlocpad"> <i class="fas fa-align-justify"></i> Text Post</div>
        </a>
        <a class="editbuttonnostyle simple-ajax-popup" href="createimgcpost">
            <div class="wrapperlocationsdiv wrapperlocpad"><i class="fas fa-images"></i> Image Post </div>
        </a>
    </div>
    <a class="editbuttonnostyle simple-ajax-popup" href="searchusercommunity">
        <div class="wrappercommdiv"><i class="fas fa-eye"></i> View Posts By </div>
    </a>

    <?php
    $sql =  "$selectusr";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $Id = $rows['cpost_id'];
        $Img = $rows['cpost_img'];
        $CUser = $rows['cpost_user'];
        $Caption = $rows['cpost_caption'];
        $Time = $rows['cpost_time'];
        $dateA = date("h:i a", strtotime($Time));
        $dateB = date("F j, Y", strtotime($Time));
        $dateC = $dateB . " at " . $dateA;
        $newdate = $dateC;
    ?>
        <div class="cpost-box">
            <div class="cpostcontent">
                <?php
                $sql3 = "SELECT * FROM users WHERE username='$CUser' LIMIT 1;";
                $res3 = $conn->query($sql3);
                while ($rows3 = $res3->fetch_assoc()) {
                    $Username = $rows3['username'];
                    $FName = $rows3['user_fname'];
                    $LName = $rows3['user_lname'];
                    $Image = $rows3['user_img'];
                ?>
                    <div class="cpostrow cpostheader">
                        <div class="cpostavatar">
                            <img src="img/users/<?php echo $Image; ?>" alt="userimg" />
                        </div>
                        <div class="cpostname">
                            <h5><a href="user/<?php echo $Username; ?>" target="_blank"><?php echo $FName; ?> <?php echo $LName; ?></a></h5>
                            <h5><a href="user/<?php echo $Username; ?>" target="_blank">@<?php echo $Username; ?></a></h5>
                            <span class="cpostsub"><?php echo $newdate; ?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="cpostrow cposttext">
                    <?php echo $Caption; ?>
                </div>
                <?php
                $sql2 = "SELECT cpost_img FROM cposts WHERE cpost_id=$Id LIMIT 1;";
                $res2 = $conn->query($sql2);
                while ($rows2 = $res2->fetch_assoc()) {
                    $Img = $rows2['cpost_img'];
                    if ($Img == null) {
                    } else {
                ?>
                        <div class="cpostrow cpostthumbnail">
                            <img src="img/cposts/<?php echo $Img; ?>" alt="Image" />
                        </div>
                <?php
                    }
                }
                ?>
                <hr />
            </div>
            <div class="commentcpost">
                <?php
                $result22 = mysqli_query($conn, "SELECT * FROM cposts_comments WHERE cpost_id='$Id' AND cpc_approved='1';");
                $row22 = mysqli_num_rows($result22);
                ?>
                <div class="showmorecomments">
                    <a style="float:left;" class="postpopup" href="community-post/<?php echo $Id; ?>"> <?php echo $row22; ?> Comments </a>
                    <a style="float:right;" class="postpopup" href="community-post/<?php echo $Id; ?>"> View/Add Comments </a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</main>

<script>
    $(document).ready(function() {
        $('.simple-ajax-popup').magnificPopup({
            type: 'ajax'
        });
    });
    $(document).ready(function() {
        $('.postpopup').magnificPopup({
            type: 'ajax'
        });
    });
</script>


<?php
require "includes/footer.php";
?>