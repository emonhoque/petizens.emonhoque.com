<?php
include_once 'dbh.inc.php';

if (isset($_POST['loc_submit'])) {

    $LocName = mysqli_real_escape_string($conn, $_POST['loc_name']);
    $LocCate = mysqli_real_escape_string($conn, $_POST['loc_category']);
    $LocDesc = mysqli_real_escape_string($conn, $_POST['loc_desc']);
    $LocLink = mysqli_real_escape_string($conn, $_POST['loc_link']);
    $LocLng = mysqli_real_escape_string($conn, $_POST['loc_lng']);
    $LocLat = mysqli_real_escape_string($conn, $_POST['loc_lat']);

    $sql = "INSERT INTO `locations` (location_lng, location_lat, location_name, location_cate, location_desc, location_link) 
                VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script> window.location.assign('../admin-wrong'); </script>";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $LocLng, $LocLat, $LocName, $LocCate, $LocDesc, $LocLink);
        mysqli_stmt_execute($stmt);
        echo "<script> window.location.assign('../listlocations?success'); </script>";
    }
} else {
    echo "<script> window.location.assign('../admin-wrong'); </script>";
}
