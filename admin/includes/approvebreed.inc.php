<?php
include_once 'dbh.inc.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$photoId = $_GET['bid'];

$sql =  "UPDATE breed
SET breed_approve='1'
WHERE breed_id='$photoId';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../animalsbreeds?success");
} else {
    echo ' Error ';
}
