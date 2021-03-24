<?php
include_once 'dbh.inc.php';

//Details
if (isset($_POST['user_submit'])) {
    $ID = mysqli_real_escape_string($conn, $_POST['user_id']);
    $Fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
    $Username = mysqli_real_escape_string($conn, $_POST['username']);
    $Email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $Phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $Desc = $_POST['user_desc'];

    $sql =  "UPDATE users
    SET user_fname='$Fname', 
        user_lname='$Lname', 
        user_email='$Email',
        user_phone='$Phone',
        user_desc='$Desc'
    WHERE user_id='$ID';";

    $result = mysqli_query($conn, $sql);

    header('location:../user/' . $Username);
} else {
    header('location:../error-wrong?2');
}
