<?php
include_once 'dbh.inc.php';


ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$photoId = $_GET['bid'];

if (isset($_GET['approve'])) {
    $sql =  "UPDATE breed
SET breed_approve='1'
WHERE breed_id='$photoId';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:../breeds-approval?success");
    } else {
        echo ' Error ';
    }
} else {
    echo ' ereororoor ';
}

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM breed where breed_id='$photoId';";
    $result = mysqli_query($conn, $sql) or die("error");

    if ($result) {
        header("location:../breeds-approval?success");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    echo ' ereororoo2 ';
}
