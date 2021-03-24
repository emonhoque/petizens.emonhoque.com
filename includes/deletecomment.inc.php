<?php
include_once 'dbh.inc.php';

session_start();

$username = $_SESSION['username'];
$commentid = $_GET['cid'];


$sql = "DELETE FROM posts_comments where pc_id='$commentid'";
$result = mysqli_query($conn, $sql) or die("error");

if ($result) {
    header('location:../user/' . $username . '/posts');
} else {
    header('location:../error-wrong?delete-failed');
}
