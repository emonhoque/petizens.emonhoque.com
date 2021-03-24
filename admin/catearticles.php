<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Article Categories</title>
</head>

<main class="main-content">

    <div class="au-2">
        <h1 class="auh-2">Article Categories</h1><br>
    </div>


    <div class="catetable">

        <div class="catetableinlineblock">
            <?php
            $sql = "SELECT * FROM article_categories";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $CatID = $rows['category_id'];
                $CatName = $rows['category_name'];
            ?>
                <div class="categoriesdiv">
                    <a href="catelistarticles?category_name=<?php echo $CatName; ?>"><img src="img/icons/<?php echo $CatName; ?>.png" alt=" <?php echo $CatName; ?> "></a>
                    <p style="padding:10px"><?php echo $CatName; ?></p>
                </div>
            <?php
            }
            ?>
            <div class="categoriesdiv">
                <a href="articles"><img src="img/icons/back.png" alt="listarticles"></a>
                <p style="padding:10px">Back</p>
            </div>
        </div>
    </div>

</main>

<?php
require "includes/footer.php";
?>