<?php
include_once 'dbh.inc.php';

$UserID = $_GET['id'];

$sql = "DELETE FROM users where username='$UserID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../user-details?success");
} else {
    echo ' Please Check Your Query ';
}
