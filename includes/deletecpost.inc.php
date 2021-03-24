<?php
include_once 'dbh.inc.php';

session_start();

$username = $_SESSION['username'];
$cpostId = $_GET['cpostid'];
$username2 = $_GET['uname'];

if ($username === $username2) {
    if (
        isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
    ) {
        $sql = "DELETE FROM cposts where cpost_id='$cpostId' AND cpost_user='$username2'";
        $result = mysqli_query($conn, $sql) or die("error");

        if ($result) {
            header('location:../../community');
        } else {
            header('location:../../error-wrong?delete-failed');
        }
    } else {
        header("location: ../../userlogin?1");
    };
} else {
    header("location: ../../community");
}
