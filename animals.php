<?php
require_once "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Animals</title>
</head>

<style>
    @media screen and (max-width: 767px) {}
</style>


<main class="main-content">

    <div class="animaldiv">
        <h1> Animals </h1>
    </div>

    <div class="animals-table">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = 'Cats'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_descshort']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?>
        <div class="animals-row-flex">
            <?php
            $sql = "SELECT * FROM articles WHERE art_category ='Cats' ORDER BY art_id DESC LIMIT 3";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtBody = $rows['art_body'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <div class="animals-row">
                    <h3 class="aricle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                    <div class="animals-row-bottom">
                        <img class="aricle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="animals-writtenby">Written By: <?php echo $ArtAdmin; ?> </p>
                        <p class="animals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <p class="animals-viewall">
            <a href="animals/cats">View All Articles about Cats!</a>
        </p>
    </div>

    <div class="animals-table">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = 'Dogs'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_descshort']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?><div class="animals-row-flex">
            <?php
            $sql = "SELECT * FROM articles WHERE art_category ='Dogs' ORDER BY art_id DESC LIMIT 3";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <div class="animals-row">
                    <h3 class="aricle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                    <div class="animals-row-bottom">
                        <img class="aricle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="animals-writtenby">Written By: <?php echo $ArtAdmin; ?> </p>
                        <p class="animals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a> </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <p class="animals-viewall">
            <a href="animals/dogs">View All Articles about Dogs!</a>
        </p>
    </div>

    <div class="animals-table">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = 'Birds'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_descshort']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?><div class="animals-row-flex">
            <?php
            $sql = "SELECT * FROM articles WHERE art_category ='Birds' ORDER BY art_id DESC LIMIT 3";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <div class="animals-row">
                    <h3 class="aricle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                    <div class="animals-row-bottom">
                        <img class="aricle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="animals-writtenby">Written By: <?php echo $ArtAdmin; ?> </p>
                        <p class="animals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a> </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <p class="animals-viewall">
            <a href="animals/birds">View All Articles about Birds!</a>
        </p>
    </div>

    <div class="animals-table">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = 'Fishes'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_descshort']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?>
        <div class="animals-row-flex">
            <?php
            $sql = "SELECT * FROM articles WHERE art_category ='Fishes' ORDER BY art_id DESC LIMIT 3";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <div class="animals-row">
                    <h3 class="aricle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                    <div class="animals-row-bottom">
                        <img class="aricle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="animals-writtenby">Written By: <?php echo $ArtAdmin; ?> </p>
                        <p class="animals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a> </p>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <p class="animals-viewall">
            <a href="animals/fishes">View All Articles about Fishes!</a>
        </p>
    </div>

    <div class="animals-table">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = 'Rodents'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_descshort']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?>
        <div class="animals-row-flex">
            <?php
            $sql = "SELECT * FROM articles WHERE art_category ='Rodents' ORDER BY art_id DESC LIMIT 3";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <div class="animals-row">
                    <h3 class="aricle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                    <div class="animals-row-bottom">
                        <img class="aricle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="animals-writtenby">Written By: <?php echo $ArtAdmin; ?> </p>
                        <p class="animals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a> </p>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <p class="animals-viewall">
            <a href="animals/rodents">View All Articles about Rodents!</a>
        </p>
    </div>
</main>


<?php
require "includes/footer.php";
?>