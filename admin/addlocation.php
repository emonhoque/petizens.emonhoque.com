<?php
require "../admin/includes/header.php";

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Add New Location</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>Add New Location</h1><br>
        <form class="addarticle" action=includes/addlocdetails.inc.php method="POST">
            <strong>Name:</strong><br>
            <input type="text" required="true" name="loc_name" placeholder="Location Name" autocomplete="off" value=""><br>
            <strong>Category:</strong><br>
            <select id="category" name="loc_category">
                <?php
                $sql = "SELECT DISTINCT(location_cate) FROM locations";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $Lcate = $rows['location_cate'];
                ?>
                    <option value="<?php echo $Lcate; ?>"><?php echo $Lcate; ?></option>
                <?php
                }
                ?>
            </select><br>
            <strong>Description:</strong><br>
            <textarea style="width:300px; height:300px;" type="text" required="true" name="loc_desc" placeholder="Description" autocomplete="off"></textarea><br>
            <strong>Location GMap Link:</strong><br>
            <input type="text" required="true" name="loc_link" placeholder="Link" autocomplete="off" value=""><br>
            <strong>Longitude:</strong><br>
            <input type="text" required="true" name="loc_lng" placeholder="Longitude" autocomplete="off" value=""><br>
            <strong>Latitude:</strong><br>
            <input type="text" required="true" name="loc_lat" placeholder="Latitude" autocomplete="off" value=""><br>
            <button class="btn" type="submit" value="loc_submit" name="loc_submit"> Submit Location </button>
            <p> <strong>*Make Sure the information are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>