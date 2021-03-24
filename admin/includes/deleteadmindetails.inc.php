<?php
include_once 'dbh.inc.php';

$AdminID = $_GET['id'];

$sql = "DELETE FROM users where username='$AdminID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../admin-details?success");
} else {
    echo ' Please Check Your Query ';
}
