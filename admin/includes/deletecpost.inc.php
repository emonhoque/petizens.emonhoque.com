<?php
include_once 'dbh.inc.php';

$photoId = $_GET['phid'];

$sql = "DELETE FROM cposts where cpost_id='$photoId';";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../cposts-list?success");
} else {
    echo ' Please Check Your Query ';
}
