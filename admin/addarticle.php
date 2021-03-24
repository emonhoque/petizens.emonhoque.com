<?php
require "includes/header.php";
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

    <title>Add Article</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Add Article</h1><br>
    </div>

    <div class="addarticlediv"><br>
        <form class="addarticle" action=includes/addarticle.inc.php method="POST" enctype="multipart/form-data">
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
            <strong>Title:</strong><br>
            <input type="text" required="true" name="addart_title" placeholder="Title" autocomplete="off"><br>
            <label class="fileuploadname" for=" fileSelect"><strong>Picture:</strong></label><br><br>
            <input class="fileupload" type="file" name="file" id="file"><br><br>
            <strong>Tags:</strong><br>
            <input type="text" name="addart_tags" placeholder="Tags" autocomplete="off"><br>
            <strong>Body:</strong><br>
            <div class="tapadding">
                <textarea id="addart_body" name="addart_body" style="width: 80%;">
            </textarea>
            </div>
            <button class="btn" type="submit" value="addart_submit" name="addart_submit"> Add Article </button>
        </form>
    </div>

</main>


<?php
require "includes/footer.php";
?>