<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

$artcate = ucwords($_GET['category']);

$sql = "SELECT * FROM article_categories WHERE category_name='$artcate'";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['category_name'];
}

if (empty($Validation)) {
    header("location: /error-404?category-not-found");
}

$dive = mysqli_query($conn, "SELECT * FROM articles WHERE art_category='$artcate';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "block";
}

ob_end_flush();
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>All Articles About <?php echo $artcate; ?></title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = '$artcate'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_description']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?>
    </div>


    <div class="userpostflex">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <h1 class="userposth1">All Articles About <?php echo $artcate; ?></h1>
                    <div class="searchbar">
                        <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
                    </div>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <tbody>
                    <h4 class="missingcontent" style="display:<?php echo $HideDiv; ?>;">There are no articles for this category!</h4>
                    <?php
                    $sql = "SELECT * FROM articles WHERE art_category='$artcate' ORDER BY art_id DESC";
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
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>


<?php
require "includes/footer.php";
?>