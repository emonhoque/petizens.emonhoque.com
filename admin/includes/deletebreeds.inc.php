<?php
include_once 'dbh.inc.php';

$BreedID = $_GET['id'];

$sql = "DELETE FROM breed where breed_id='$BreedID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../animalsbreeds?success");
} else {
    echo ' Please Check Your Query ';
}
