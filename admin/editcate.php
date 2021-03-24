<?php
require "../admin/includes/header.php";

$CateID = $_GET['id'];
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Edit Category Details</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>Edit Category Details</h1><br>
        <form class="addarticle" action=includes/editcate.inc.php method="POST" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM article_categories WHERE category_id='$CateID'";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $CateID = $rows['category_id'];
                $CateName = $rows['category_name'];
                $CateDesc = $rows['category_description'];
                $CateShortDesc = $rows['category_descshort'];
                $CateImg = $rows['category_img'];
                $CateLF = $rows['category_lifeexpect'];
            ?>
                <strong>Category:</strong><br>
                <input type="text" required="true" name="category_name" placeholder="Cateogry" autocomplete="off" readonly="readonly" value="<?php echo $CateName; ?>"><br>
                <strong>Description:</strong><br>
                <textarea style="width:300px; height:300px;" name="category_description" placeholder="Full Description" required="true"><?php echo $CateDesc; ?></textarea><br>
                <strong> Short Description:</strong><br>
                <textarea style="width:300px; height:300px;" name="category_descshort" placeholder="Short Description" required="true"><?php echo $CateShortDesc; ?></textarea><br>
                <strong>Life Expectency:</strong><br>
                <input type="text" required="true" name="category_lifeexpect" placeholder="Life Expectancy" autocomplete="off" value="<?php echo $CateLF; ?>"><br>
                <strong>Picture:</strong><br>
                <input type="text" required="true" name="category_img" placeholder="Image" autocomplete="off" value="<?php echo $CateImg; ?>"><br>
                <button class="btn" type="submit" value="submit_category" name="submit_category"> Submit Category </button>
            <?php
            }
            ?>
            <p> <strong>*Make Sure the information are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>