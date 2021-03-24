<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>All Articles About in Petizens</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1> All Articles </h1>
        <p class="animals-tablep"> All Articles in Petizens </p>
        <div class="animaldivp">
            <a href="animals">
                <p style="padding-top: -20px;" class="backtoadminpanel2 animaldivppp">Go Back to Animals Page!</p>
            </a>
        </div>
    </div>

    <div class="userpostflex">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <h1 class="userposth1">All Articles in Petizens</h1>
                    <div class="searchbar">
                        <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
                    </div>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <?php
                $sql = "SELECT * FROM articles ORDER BY art_id DESC";
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