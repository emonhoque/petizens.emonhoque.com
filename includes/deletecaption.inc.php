<?php
include_once 'dbh.inc.php';

session_start();

$username = $_SESSION['username'];
$photoId = $_GET['phid'];
$username2 = $_GET['uname'];

if ($username === $username2) {
    if (
        isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
    ) {
        $sql = "DELETE FROM posts where post_id='$photoId' AND post_user='$username2'";
        $result = mysqli_query($conn, $sql) or die("error");

        if ($result) {
            header('location:../../user/' . $username2 . '/posts');
        } else {
            header('location:../../error-wrong?delete-failed');
        }
    } else {
        header("location: ../../userlogin?1");
    };
} else {
    header("location: ../../user/" . $username);
}
