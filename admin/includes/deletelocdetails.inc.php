<?php
include_once 'dbh.inc.php';

$LID = $_GET['id'];

$sql = "DELETE FROM locations where location_id='$LID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../listlocations?success");
} else {
    echo ' Please Check Your Query ';
}
