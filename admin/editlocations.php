<?php
require "../admin/includes/header.php";


$LocID = $_GET['id'];

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Add New Location</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>Add New Location</h1><br>
        <form class="addarticle" action=includes/editlocdetails.inc.php method="POST">
            <?php
            $sql = "SELECT * FROM locations WHERE location_id='$LocID';";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $Lid = $rows['location_id'];
                $Llng = $rows['location_lng'];
                $Llat = $rows['location_lat'];
                $Lname = $rows['location_name'];
                $Ldesc = $rows['location_desc'];
                $Lcate = $rows['location_cate'];
                $Llink = $rows['location_link'];
            ?>
                <strong>Name:</strong><br>
                <input style="display: none;" readonly="readonly" class="input-field" type="text" id="loc_id" name="loc_id" placeholder="ID" value="<?php echo $Lid; ?>">
                <input type="text" required="true" name="loc_name" placeholder="Location Name" autocomplete="off" value="<?php echo $Lname; ?>"><br>
                <strong>Category:</strong><br>
                <input type="text" required="true" name="loc_category" placeholder="Location Category" autocomplete="off" value="<?php echo $Lcate; ?>"><br>
                <strong>Description:</strong><br>
                <textarea style="width:300px; height:300px;" type="text" required="true" name="loc_desc" placeholder="Description" autocomplete="off"><?php echo $Ldesc; ?></textarea><br>
                <strong>Location GMap Link:</strong><br>
                <input type="text" required="true" name="loc_link" placeholder="Link" autocomplete="off" value="<?php echo $Llink; ?>"><br>
                <strong>Longitude:</strong><br>
                <input type="text" required="true" name="loc_lng" placeholder="Longitude" autocomplete="off" value="<?php echo $Llng; ?>"><br>
                <strong>Latitude:</strong><br>
                <input type="text" required="true" name="loc_lat" placeholder="Latitude" autocomplete="off" value="<?php echo $Llat; ?>"><br>
                <button class="btn" type="submit" value="loc_submit" name="loc_submit"> Update Location </button>
                <p> <strong>*Make Sure the information are accurate!*</strong></p>
            <?php
            }
            ?>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>