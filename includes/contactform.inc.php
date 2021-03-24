<?php
include_once 'dbh.inc.php';

$timestamp = date("Y-m-d H:i:s");
$name = mysqli_real_escape_string($conn, $_POST['cf_name']);
$email = mysqli_real_escape_string($conn, $_POST['cf_email']);
$phone = mysqli_real_escape_string($conn, $_POST['cf_phone']);
$subject = mysqli_real_escape_string($conn, $_POST['cf_subject']);
$message = mysqli_real_escape_string($conn, $_POST['cf_message']);


if (isset($_POST['cf_submit'])) {
    $sql = "INSERT INTO contactform (cf_time, cf_name, cf_email, cf_phone, cf_subject, cf_message)
        VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script> window.location.assign('../wrong'); </script>";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $timestamp, $name, $email, $phone, $subject, $message);
        mysqli_stmt_execute($stmt);
        echo "<script> window.location.assign('../contactformsuccess'); </script>";
    }
} else {
    echo "<script> window.location.assign('../wrong'); </script>";
}
