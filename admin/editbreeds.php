<?php
require "../admin/includes/header.php";

$BreedID = $_GET['id'];
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Edit Breed Details</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>Edit Breed Details</h1><br>
        <form class="addarticle" action="includes/editbreed.inc" method="POST" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM breed WHERE breed_id='$BreedID'";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ID = $rows['breed_id'];
                $Category = $rows['breed_category'];
                $Name = $rows['breed_name'];
                $Color = $rows['breed_color'];
                $Details = $rows['breed_details'];
                $Image = $rows['breed_img'];
                $arr = array(1 => 'Yes', 0 => 'No');
                $approved = $arr[$rows['breed_approve']];
            ?>
                <strong>Category:</strong><br>
                <input style="display: none;" readonly="readonly" class="input-field" type="text" id="breed_id" name="breed_id" placeholder="ID" value="<?php echo $ID; ?>">
                <input type="text" required="true" name="breed_category" placeholder="Cateogry" autocomplete="off" readonly="readonly" value="<?php echo $Category; ?>"><br>
                <strong>Name:</strong><br>
                <input type="text" required="true" name="breed_name" placeholder="Name" autocomplete="off" readonly="readonly" value="<?php echo $Name; ?>"><br>
                <strong> Color:</strong><br>
                <input type="text" required="true" name="breed_color" placeholder="Color" autocomplete="off" readonly="readonly" value="<?php echo $Color; ?>"><br>
                <strong>Breed Details:</strong><br>
                <textarea style="width:300px; height:300px;" name="breed_details" placeholder="Short Description" required="true"><?php echo $Details; ?></textarea><br>
                <strong>Picture:</strong><br>
                <input type="text" required="true" name="breed_img" placeholder="Image" autocomplete="off" value="<?php echo $Image; ?>"><br>
                <button class="btn" type="submit" value="submit_breed" name="submit_breed"> Submit Category </button>
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