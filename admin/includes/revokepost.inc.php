<?php
include_once 'dbh.inc.php';

$photoId = $_GET['phid'];

$sql =  "UPDATE posts
SET post_approved='0'
WHERE post_id='$photoId';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../posts-list?success");
} else {
    echo ' Error ';
}
