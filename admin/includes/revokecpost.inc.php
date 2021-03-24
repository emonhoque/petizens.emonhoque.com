<?php
include_once 'dbh.inc.php';

$photoId = $_GET['phid'];

$sql =  "UPDATE cposts
SET cpost_approved='0'
WHERE cpost_id='$photoId';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../cposts-list?success");
} else {
    echo ' Error ';
}
