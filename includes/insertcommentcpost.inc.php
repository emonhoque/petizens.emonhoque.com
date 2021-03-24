<?php
session_start();
include_once 'dbh.inc.php';

$User = mysqli_real_escape_string($conn, $_POST['cpost_user']);
$CpostID = mysqli_real_escape_string($conn, $_POST['cpost_id']);
$Comment = mysqli_real_escape_string($conn, $_POST['cpost_comment']);

if (
    isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $User
) {
    $editUser = "block";
} else {
    header("location: ../error-wrong");
};


if (isset($_POST['cpostcomment_submit'])) {
    $sql = "INSERT INTO cposts_comments (cpc_user, cpost_id, cpc_comment) 
VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $User, $CpostID, $Comment);
        mysqli_stmt_execute($stmt);
    }
} else {
    header('location:../error-wrong?Failed');
}
