<?php
require "includes/header.php";

$ArtID = $_GET['art_id'];
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <script src="https://cdn.tiny.cloud/1/mhbzdq2y3ajxddojofeybnagsw3yroodf93nzi74owlw7bba/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

    <style>
        .mce-notification {display: none !important;}
    </style>

    <title>Edit Article</title>
</head>

<main class="main-content">

    <div class="addarticlediv"><br>
        <h1>Edit Article Number <?php echo $ArtID; ?> </h1> <br>
        <form class="addarticle" action=includes/editarticle.inc.php method="POST">
            <strong>Admin:</strong><br>
            <select id="admin" name="addart_admin">
                <?php
                $sql = "SELECT * FROM admins";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                ?>
                    <option value="<?php echo $rows['admin_name']; ?>"><?php echo $rows['admin_name']; ?></option>
                <?php
                }
                ?>
            </select><br>
            <strong>Category:</strong><br>
            <select id="category" name="addart_category">
                <?php
                $sql = "SELECT * FROM article_categories";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                ?>
                    <option value="<?php echo $rows['category_name']; ?>"><?php echo $rows['category_name']; ?></option>
                <?php
                }
                ?>
            </select><br>
            <?php
            $sql = "SELECT * FROM articles WHERE art_id='$ArtID'";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtTitle = $rows['art_title'];
                $ArtBody = $rows['art_body'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
            ?>
                <strong>Title:</strong><br>
                <input type="text" required="true" name="addart_title" placeholder="Title" autocomplete="off" value="<?php echo $ArtTitle; ?>"><br>
                <strong>Image:</strong><br>
                <input type="text" required="true" name="addart_img" placeholder="URL" autocomplete="off" value="<?php echo $ArtImg; ?>"><br>
                <strong>Tags:</strong><br>
                <input type="text" name="addart_tags" placeholder="Tags" autocomplete="off" value="<?php echo $ArtTags; ?>"><br>
                <input style="display: none;" type="text" required="true" name="addart_id" placeholder="ID" autocomplete="off" value="<?php echo $ArtID; ?>">
                <strong>Body:</strong><br>
                <div class="tapadding">
                    <textarea id="addart_body" name="addart_body" style="width: 80%;">
                <?php echo $ArtBody; ?> 
            </textarea>
                </div>
            <?php
            }
            ?>
            <button class="btn" type="submit" value="editart_submit" name="editart_submit"> Submit Edit </button>
            <p> <strong>*Make Sure the Categories and Admin tabs are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "includes/footer.php";
?>