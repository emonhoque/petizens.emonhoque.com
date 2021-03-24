<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

$username = $_GET['user'];

$result = mysqli_query($conn, "SELECT * FROM articles WHERE art_admin='$username';");
$row = mysqli_num_rows($result);

$sql = "SELECT * FROM users WHERE username='$username'";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['username'];
}

if (empty($Validation)) {
    header("location: /error-users?not-found");
}

$dive = mysqli_query($conn, "SELECT * FROM articles WHERE art_admin='$username';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "none";
    $ShowDivUserPosts = "block";
}

$result = mysqli_query($conn, "SELECT * FROM articles WHERE art_admin='$username';");
$rowed = mysqli_num_rows($result);

ob_end_flush();
?>


<head>
    <link rel="stylesheet" href="style/style.css" />
    <title><?php echo $username; ?>'s Articles</title>
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
            <h1><?php echo $FName; ?> <?php echo $LName; ?>'s Articles</h1>

            <p>A list of every article written by <?php echo $username; ?></p>
            <div class="animaldivp">
                <a href="user/<?php echo $username; ?>">
                    <p style="padding-top: -20px;" class="backtoadminpanel2 animaldivppp">Go Back to <?php echo $FName; ?>'s Profile!</p>
                </a>
            <?php
        }
            ?>
            </div>
            <h4 class="missingcontent" style="display:<?php echo $ShowDivUserPosts; ?>;">There are no articles written by this user!</h4>

    </div>

    <div class="userpostflex" style="display:<?php echo $HideDiv; ?>">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <?php
                    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1;";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $FName = $rows['user_fname'];
                        $LName = $rows['user_lname'];
                    ?>
                        <div class="noofarts">
                            <h2 class="userposth5">Recent Articles Written By <?php echo $FName; ?></h2>
                            <p><strong>Number of Articles:</strong> <?php echo $rowed; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="searchbar">
                        <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
                    </div>
                    <hr class="userposthr">
                </thead>

                <?php
                $sql = "SELECT * FROM articles WHERE art_admin='$username' ORDER BY art_id DESC";
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
                        <tr class="target">
                            <td style="width: 40%;" class="tablenone">
                                <img class="userpostimg" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                            </td>
                            <td style="width: 60%;">
                                <img class="userpostimg2" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                                <h3 class="userposth3"><?php echo $ArtTitle; ?> </h3>
                                <p class="userpostcategoryp"><span style="font-weight: bold;">Category: </span><?php echo $ArtCat; ?></p>
                                <div class="userpostbodyp"><?php echo $first20words; ?>...</div>
                                <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">
                                    <p class="userpostreadmore"><span>Read More</span></p>
                                </a>
                                <hr class="userposthr">
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

</main>


<?php
require "includes/footer.php";
?>