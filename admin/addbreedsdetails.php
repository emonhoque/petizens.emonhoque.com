<?php
require "../admin/includes/header.php";

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Add Breeds Details</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>New Animal Breed</h1><br>
        <form class="addarticle" action=includes/addbreedsdetails.inc.php method="POST" enctype="multipart/form-data">
            <strong>Category:</strong><br>
            <select id="category" name="breed_category">
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
            <strong>Name:</strong><br>
            <input type="text" required="true" name="breed_name" placeholder="Breed Name" autocomplete="off" value=""><br>
            <strong>Color:</strong><br>
            <input type="text" required="true" name="breed_color" placeholder="Color" autocomplete="off" value=""><br>
            <label class="fileuploadname" for=" fileSelect"><strong>Picture:</strong></label><br><br>
            <input class="fileupload" type="file" name="file" id="file"><br><br>
            <strong>Description:</strong><br>
            <textarea style="width:300px; height:300px;" type="text" required="true" name="breed_details" placeholder="Description" autocomplete="off"></textarea><br>
            <button class="btn" type="submit" value="breed_submit" name="breed_submit"> Add Breed </button>
            <p> <strong>*Make Sure the information are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>