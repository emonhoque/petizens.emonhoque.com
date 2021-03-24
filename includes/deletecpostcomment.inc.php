<?php
include_once 'dbh.inc.php';

$commentid = $_GET['cid'];

$sql = "DELETE FROM cposts_comments where cpc_id='$commentid'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header('location:../community');
} else {
    header('location:../error-wrong?delete-failed');
}
