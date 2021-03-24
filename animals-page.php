<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

if (
    !empty($_SESSION['id'])
) {
    $createUser = "inline-block";
} else {
    $createUser = "none";
}

$MainCategory = $_GET['category'];

$sql = "SELECT * FROM article_categories WHERE category_name='$MainCategory'";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['category_name'];
}

if (empty($Validation)) {
    header("location: /error-404?category-not-found");
}

$dive = mysqli_query($conn, "SELECT * FROM breed WHERE breed_category='$MainCategory' AND breed_approve='1';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "none";
}

$result1 = mysqli_query($conn, "SELECT * FROM articles WHERE art_category='$MainCategory';");
$row1 = mysqli_num_rows($result1);

if ($row1 < 1) {
    $HideDiv1 = "block";
}

$result = mysqli_query($conn, "SELECT * FROM articles WHERE art_category='$MainCategory';");
$row = mysqli_num_rows($result);

$result2 = mysqli_query($conn, "SELECT * FROM breed WHERE breed_category='$MainCategory' AND breed_approve='1';");
$row2 = mysqli_num_rows($result2);

ob_end_flush();
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title><?php echo ucwords($MainCategory); ?></title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = '$MainCategory'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_description']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
        <?php
        }
        ?>
    </div>

    <div class="userdetailsflex">
        <div class="userdetails">
            <table class="userdetailstable">
                <tbody>
                    <?php
                    $sql = "SELECT * FROM article_categories WHERE category_name = '$MainCategory'";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $CateName = ucfirst($rows['category_name']);
                        $CateDesc = $rows['category_description'];
                        $CateImg = $rows['category_img'];
                        $CateLE = $rows['category_lifeexpect'];
                    ?>
                        <tr>
                            <td style="width: 50%;" class="tablenone">
                                <img class="userdetailsimg" src="img/animals/<?php echo $CateImg; ?>" alt="userimg">
                            </td>
                            <td style="width: 50%;" class="userdetailsmargin">
                                <img class="userdetailsimg2" src="img/animals/<?php echo $CateImg; ?>" alt="userimg">
                                <p><strong>Species Name:</strong></p>
                                <p><?php echo $CateName; ?></p><br>
                                <p><strong>Description:</strong></p>
                                <p><?php echo $CateDesc; ?></p><br>
                                <p><strong>Life Expectancy:</strong></p>
                                <p><?php echo $CateLE; ?></p><br>
                                <p><strong>Number of Articles:</strong></p>
                                <p><?php echo $row; ?></p><br>
                                <a class="editbuttonnostyle" href="add-breed" style="float:right">
                                    <button type="submit" class="editbuttonusers editbuttonusershover" style="display:<?php echo $createUser ?>;"> Add New Breed <i class="fas fa-plus" style="font-size:20px"></i></button>
                                </a>
                                <p><strong>Number of Breeds:</strong></p>
                                <p><?php echo $row2; ?></p>
                                <a class="editbuttonnostyle" href="add-breed">
                                    <button type="submit" class="editbuttonusersmobile editbuttonusershover" style="display:<?php echo $createUser ?>">Add New Breed <i class="fa fa-plus" style="font-size:20px"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div class="userpostflex breedhide" style="display:<?php echo $HideDiv; ?>">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <div class="noofarts">
                        <h2>Different Breeds of <?php echo ucwords($MainCategory); ?> </h2>
                    </div>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <?php
                $sql = "SELECT * FROM breed WHERE breed_category='$MainCategory' AND breed_approve='1' ORDER BY breed_id DESC LIMIT 3";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $BreedID = $rows['breed_id'];
                    $BreedCat = ucwords($rows['breed_category']);
                    $BreedName = $rows['breed_name'];
                    $BreedColor = $rows['breed_color'];
                    $BreedDetails = $rows['breed_details'];
                    $BreedImg = $rows['breed_img'];
                    $BreedUser = $rows['breed_submit'];
                    if ($BreedUser == "admin") {
                        $echooooooo = "";
                    } else {
                        $echooooooo = "Submitted By:</span> @$BreedUser";
                    }
                ?>
                    <tbody>
                        <tr>
                            <td style="width: 50%;" class="tablenone">
                                <img class="userpostimg21" src="img/breeds/<?php echo $BreedImg; ?>" alt="articleimg">
                            </td>
                            <td style="width: 50%;">
                                <img class="userpostimg22" src="img/breeds/<?php echo $BreedImg; ?>" alt="articleimg">
                                <h2 class="userposth32"><?php echo $BreedName; ?> </h2>
                                <p class="userpostcategoryp2"><span style="font-weight: bold;">Color: </span><?php echo $BreedColor; ?></p>
                                <div class="userpostbodyp2"><?php echo $BreedDetails; ?></div>
                                <p class="userpostcategoryp2" style="font-size: 12px;"><span style="font-weight: bold;"><?php echo $echooooooo; ?></p>
                                <hr class="userposthr">
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>

            <p class="viewalluserstable">
                <a href="animals/<?php echo $MainCategory; ?>/all-breeds"><span>View All Breeds of <?php echo ucwords($MainCategory); ?> Here</span></a>
            </p>
        </div>
    </div>
    <br>
    <div class="userpostflex">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <h1 class="userposth1">Recent Articles About <?php echo ucwords($MainCategory); ?></h1>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <tbody>
                    <h4 class="missingcontent" style="display:<?php echo $HideDiv1; ?>;">There are no Articles for this category!</h4>
                    <?php
                    $sql = "SELECT * FROM articles WHERE art_category='$MainCategory' ORDER BY art_id DESC LIMIT 3";
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
                        $first20words = join(" ", array_slice($words, 0, 20));
                    ?>
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
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <p class="viewalluserstable">
                <a href="animals/<?php echo $MainCategory; ?>/all-articles"><span>View All Articles About <?php echo ucwords($MainCategory); ?> Here</span></a>
            </p>
        </div>
    </div>

</main>


<?php
require "includes/footer.php";
?>