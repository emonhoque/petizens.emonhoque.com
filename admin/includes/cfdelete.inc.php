<?php
include_once 'dbh.inc.php';

$CFID = $_GET['cf_id'];

$sql = "DELETE FROM contactform where cf_id='$CFID'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header("location:../contact-form-enquries?success");
} else {
    echo ' Please Check Your Query ';
}
