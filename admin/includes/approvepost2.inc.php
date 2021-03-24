<?php
include_once 'dbh.inc.php';

$photoId = $_GET['phid'];

$sql =  "UPDATE posts
SET post_approved='1'
WHERE post_id='$photoId';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../posts-approval?success");
} else {
    echo ' Error ';
}
