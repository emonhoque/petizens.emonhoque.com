<?php
include_once 'dbh.inc.php';

$ArtID = $_GET['art_id'];

$sql = "DELETE FROM articles where art_id='$ArtID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../deletearticles?success");
} else {
    echo ' Please Check Your Query ';
}
