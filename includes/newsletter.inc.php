<?php
include_once 'dbh.inc.php';

$email = mysqli_real_escape_string($conn, $_POST['newsletter']);



if (isset($_POST['btn-newsletter'])) {
    $sql = "INSERT INTO newsletter (newsletter_email)
        VALUES (?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script> window.location.assign('../wrong'); </script>";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        echo "<script> window.location.assign('../newslettersuccess'); </script>";
    }
} else {
    echo "<script> window.location.assign('../wrong'); </script>";
}
