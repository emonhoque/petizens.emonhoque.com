<?php
session_start();
include_once 'dbh.inc.php';

$User = mysqli_real_escape_string($conn, $_POST['pc_user']);
$PhotoID = mysqli_real_escape_string($conn, $_POST['post_id']);
$Comment = mysqli_real_escape_string($conn, $_POST['pc_comment']);

$UserAccount = mysqli_real_escape_string($conn, $_POST['pc_user_account']);

if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $User
) {
    $editUser = "block";
} else {
    header("location: ../error-wrong");
};


if (isset($_POST['commentsbutton'])) {
    $sql = "INSERT INTO posts_comments (pc_user, post_id, pc_comment) 
VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../error-wrong?uploadFailed');
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $User, $PhotoID, $Comment);
        mysqli_stmt_execute($stmt);
    }
} else {
    header('location:../error-wrong?Failed');
}
