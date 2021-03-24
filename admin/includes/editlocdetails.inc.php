<?php
include_once 'dbh.inc.php';

if (isset($_POST['loc_submit'])) {

    $LocId = mysqli_real_escape_string($conn, $_POST['loc_id']);
    $LocName = mysqli_real_escape_string($conn, $_POST['loc_name']);
    $LocCate = mysqli_real_escape_string($conn, $_POST['loc_category']);
    $LocDesc = mysqli_real_escape_string($conn, $_POST['loc_desc']);
    $LocLink = mysqli_real_escape_string($conn, $_POST['loc_link']);
    $LocLng = mysqli_real_escape_string($conn, $_POST['loc_lng']);
    $LocLat = mysqli_real_escape_string($conn, $_POST['loc_lat']);

    $sql =  "UPDATE locations
            SET location_lng='$LocLng',
            location_lat='$LocLat',
            location_name='$LocName',
            location_cate='$LocCate',
            location_desc='$LocDesc',
            location_link='$LocLink'
            WHERE location_id='$LocId';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:../listlocations?success");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    echo "<script> window.location.assign('../admin-wrong'); </script>";
}
